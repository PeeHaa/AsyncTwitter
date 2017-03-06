<?php declare(strict_types = 1);

use Amp\Artax\Client;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
use PeeHaa\AsyncTwitter\Api\Client\Client as ApiClient;

$applicationCredentials = new Application(
    'consumerkey',
    'consumersecret'
);

$accessToken = new AccessToken(
    'accesstoken',
    'tokensecret'
);

$httpClient = new Artax(new Client());
$apiClient  = new ApiClient($httpClient, $applicationCredentials, $accessToken);

return $apiClient;
