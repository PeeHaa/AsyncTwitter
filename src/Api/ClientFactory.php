<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application as ApplicationCredentials;
use PeeHaa\AsyncTwitter\Http\Artax;

class ClientFactory
{
    private $httpClient;
    private $applicationCredentials;

    public function __construct(Artax $httpClient, ApplicationCredentials $applicationCredentials)
    {
        $this->httpClient             = $httpClient;
        $this->applicationCredentials = $applicationCredentials;
    }

    public function create(AccessToken $accessToken): Client
    {
        return new Client($this->httpClient, $this->applicationCredentials, $accessToken);
    }
}
