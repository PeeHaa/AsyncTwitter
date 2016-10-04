<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api;

use Amp\Artax\Response as HttpResponse;
use Amp\Promise;
use ExceptionalJSON\DecodeErrorException as JSONDecodeErrorException;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
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

    public function __construct(Artax $httpClient, Application $applicationCredentials, AccessToken $accessToken)
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
                throw new InvalidMethodException();
        }
    }

    private function getErrorStringFromResponseBody(array $body)
    {
        if (!isset($body['errors'])) {
            return ['Unknown error', -1, []];
        }

        $message = (string)($body['errors'][0]['message'] ?? 'Unknown error');
        $code = (int)($body['errors'][0]['code'] ?? -1);
        $extra = [];

        for ($i = 1; isset($body['errors'][$i]); $i++) {
            $extra[(int)($body['errors'][$i]['code'] ?? -1)] = (string)($body['errors'][$i]['message'] ?? 'Unknown error');
        }

        return [$message, $code, $extra];
    }

    // https://dev.twitter.com/overview/api/response-codes
    private function throwFromErrorResponse(HttpResponse $response, array $body)
    {
        list($message, $code, $extra) = $this->getErrorStringFromResponseBody($body);

        switch ($response->getStatus()) {
            case 400: throw new BadRequestException($message, $code, null, $extra);
            case 401: throw new UnauthorizedException($message, $code, null, $extra);
            case 403: throw new ForbiddenException($message, $code, null, $extra);
            case 404: throw new NotFoundException($message, $code, null, $extra);
            case 406: throw new NotAcceptableException($message, $code, null, $extra);
            case 410: throw new GoneException($message, $code, null, $extra);
            case 420: throw new RateLimitTriggeredException($message, $code, null, $extra);
            case 422: throw new UnprocessableEntityException($message, $code, null, $extra);
            case 429: throw new RateLimitTriggeredException($message, $code, null, $extra);
            case 500: throw new ServerErrorException($message, $code, null, $extra);
            case 502: throw new BadGatewayException($message, $code, null, $extra);
            case 503: throw new ServiceUnavailableException($message, $code, null, $extra);
            case 504: throw new GatewayTimeoutException($message, $code, null, $extra);
        }
    }

    private function handleResponse(Promise $responsePromise): Promise
    {
        return resolve(function() use($responsePromise) {
            /** @var HttpResponse $response */
            $response = yield $responsePromise;

            try {
                $decoded = json_try_decode($response->getBody(), true);
            } catch (JSONDecodeErrorException $e) {
                throw new RequestFailedException('Failed to decode response body as JSON', $e->getCode(), $e);
            }

            $this->throwFromErrorResponse($response, $decoded);

            return $decoded;
        });
    }

    private function post(Request $request): Promise
    {
        $header = $this->getHeader('POST', $request->getEndpoint(), ...$request->getParameters());

        $response = $this->httpClient->post($request->getEndpoint(), $header, new Body(...$request->getParameters()));
        return $this->handleResponse($response);
    }

    private function get(Request $request): Promise
    {
        $header = $this->getHeader('GET', $request->getEndpoint(), ...$request->getParameters());

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
