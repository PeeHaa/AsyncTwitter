<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use Amp\Artax\Client;
use PeeHaa\AsyncTwitter\Api\Request\Status\Show;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
use PeeHaa\AsyncTwitter\Api\Client\Client as ApiClient;

require_once __DIR__ . '/../vendor/autoload.php';

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

$request = (new Show(210462857140252672))
    ->trimUser()
    ->excludeEntities()
    ->includeUserRetweetStatus()
;

\Amp\wait($apiClient->request($request));
