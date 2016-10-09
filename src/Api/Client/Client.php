<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Client;

use Amp\Artax\Response as HttpResponse;
use Amp\Promise;
use ExceptionalJSON\DecodeErrorException as JSONDecodeErrorException;
use PeeHaa\AsyncTwitter\Api\Client\Exception\BadGateway;
use PeeHaa\AsyncTwitter\Api\Client\Exception\BadRequest;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Forbidden;
use PeeHaa\AsyncTwitter\Api\Client\Exception\GatewayTimeout;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Gone;
use PeeHaa\AsyncTwitter\Api\Client\Exception\InvalidMethod;
use PeeHaa\AsyncTwitter\Api\Client\Exception\NotAcceptable;
use PeeHaa\AsyncTwitter\Api\Client\Exception\NotFound;
use PeeHaa\AsyncTwitter\Api\Client\Exception\RateLimitTriggered;
use PeeHaa\AsyncTwitter\Api\Client\Exception\RequestFailed;
use PeeHaa\AsyncTwitter\Api\Client\Exception\ServerError;
use PeeHaa\AsyncTwitter\Api\Client\Exception\ServiceUnavailable;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Unauthorized;
use PeeHaa\AsyncTwitter\Api\Client\Exception\UnprocessableEntity;
use PeeHaa\AsyncTwitter\Api\Request\Request;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Client as HttpClient;
use PeeHaa\AsyncTwitter\Oauth\Header;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Oauth\Signature\BaseString;
use PeeHaa\AsyncTwitter\Oauth\Signature\Key;
use PeeHaa\AsyncTwitter\Oauth\Signature\Signature;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use function Amp\resolve;
use function ExceptionalJSON\decode as json_try_decode;

class Client
{
    private $httpClient;

    private $applicationCredentials;

    private $accessToken;

    public function __construct(HttpClient $httpClient, Application $applicationCredentials, AccessToken $accessToken)
    {
        $this->httpClient             = $httpClient;
        $this->applicationCredentials = $applicationCredentials;
        $this->accessToken            = $accessToken;
    }

    public function request(Request $request): Promise
    {
        switch ($request->getMethod()) {
            case 'POST':
                return $this->post($request);

            case 'GET':
                return $this->get($request);

            default:
                throw new InvalidMethod();
        }
    }

    private function getErrorStringFromResponseBody(array $body): array
    {
        if (!isset($body['errors'])) {
            return ['Unknown error', -1, []];
        }

        $firstError = array_shift($body['errors']);

        $message = $firstError['message'] ?? 'Unknown error';
        $code    = $firstError['code'] ?? -1;
        $extra   = [];

        foreach ($body['errors'] as $error) {
            $extra[($error['code'] ?? -1)] = ($error['message'] ?? 'Unknown error');
        }

        return [$message, $code, $extra];
    }

    // https://dev.twitter.com/overview/api/response-codes
    private function throwFromErrorResponse(HttpResponse $response, array $body)
    {
        list($message, $code, $extra) = $this->getErrorStringFromResponseBody($body);

        $exceptions = [
            400 => BadRequest::class,
            401 => Unauthorized::class,
            403 => Forbidden::class,
            404 => NotFound::class,
            406 => NotAcceptable::class,
            410 => Gone::class,
            420 => RateLimitTriggered::class,
            422 => UnprocessableEntity::class,
            429 => RateLimitTriggered::class,
            500 => ServerError::class,
            502 => BadGateway::class,
            503 => ServiceUnavailable::class,
            504 => GatewayTimeout::class,
        ];

        if (!array_key_exists($response->getStatus(), $exceptions)) {
            return;
        }

        throw new $exceptions[$response->getStatus()]($message, $code, null, $extra);
    }

    private function handleResponse(Promise $responsePromise): Promise
    {
        return resolve(function() use($responsePromise) {
            /** @var HttpResponse $response */
            $response = yield $responsePromise;

            try {
                $decoded = json_try_decode($response->getBody(), true);
            } catch (JSONDecodeErrorException $e) {
                throw new RequestFailed('Failed to decode response body as JSON', $e->getCode(), $e);
            }

            $this->throwFromErrorResponse($response, $decoded);

            return $decoded;
        });
    }

    private function post(Request $request): Promise
    {
        $header   = $this->getHeader('POST', $request->getEndpoint(), ...$request->getParameters());
        $response = $this->httpClient->post($request->getEndpoint(), $header, new Body(...$request->getParameters()));

        return $this->handleResponse($response);
    }

    private function get(Request $request): Promise
    {
        $header   = $this->getHeader('GET', $request->getEndpoint(), ...$request->getParameters());
        $response = $this->httpClient->get($request->getEndpoint(), $header, ...$request->getParameters());

        return $this->handleResponse($response);
    }

    private function getHeader(string $method, Url $url, Parameter ...$parameters): Header
    {
        $oauthParameters     = new Parameters($this->applicationCredentials, $this->accessToken, $url, ...$parameters);
        $baseSignatureString = new BaseString($method, $url, $oauthParameters);
        $signingKey          = new Key($this->applicationCredentials, $this->accessToken);
        $signature           = new Signature($baseSignatureString, $signingKey);

        return new Header($oauthParameters, $signature);
    }
}
