<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Client;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application as ApplicationCredentials;
use PeeHaa\AsyncTwitter\Http\Client as HttpClient;

class ClientFactory
{
    private $httpClient;
    private $applicationCredentials;

    public function __construct(HttpClient $httpClient, ApplicationCredentials $applicationCredentials)
    {
        $this->httpClient             = $httpClient;
        $this->applicationCredentials = $applicationCredentials;
    }

    public function create(AccessToken $accessToken): Client
    {
        return new Client($this->httpClient, $this->applicationCredentials, $accessToken);
    }
}
