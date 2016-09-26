<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api;

use Amp\Promise;
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

    private function post(Request $request): Promise
    {
        $header = $this->getHeader('POST', $request->getEndpoint(), ...$request->getParameters());

        return $this->httpClient->post($request->getEndpoint(), $header, new Body(...$request->getParameters()));
    }

    private function get(Request $request): Promise
    {
        $header = $this->getHeader('GET', $request->getEndpoint(), ...$request->getParameters());

        return $this->httpClient->get($request->getEndpoint(), $header, ...$request->getParameters());
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
