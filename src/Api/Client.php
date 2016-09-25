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

            default:
                throw new InvalidMethodException();
        }
    }

    private function post(Request $request): Promise
    {
        $header = $this->getHeader($request->getEndpoint(), $request->getBody(), 'POST');

        return $this->httpClient->post($request->getEndpoint(), $header, $request->getBody());
    }

    private function getHeader(Url $url, Body $body, $method): Header
    {
        $oauthParameters     = new Parameters($this->applicationCredentials, $this->accessToken, $body, $url);
        $baseSignatureString = new BaseString($method, $url, $oauthParameters);
        $signingKey          = new Key($this->applicationCredentials, $this->accessToken);
        $signature           = new Signature($baseSignatureString, $signingKey);

        return new Header($oauthParameters, $signature);
    }
}
