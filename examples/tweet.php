<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use Amp\Artax\Client;
use PeeHaa\AsyncTwitter\Api\Request\Status\Update;
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

$request = (new Update('@Ocramius I never liked that room anyway'))
    ->replyTo(779461458715406336)
    ->isSensitive()
    ->setLatitude(41.721286)
    ->setLongitude(-87.6785337)
    ->displayCoordinates()
    ->trimUser()
;

\Amp\wait($apiClient->request($request));
