<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use Amp\Artax\Client;
use PeeHaa\AsyncTwitter\Api\Status\MentionsTimeline;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
use PeeHaa\AsyncTwitter\Api\Client as ApiClient;

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

$request = (new MentionsTimeline())
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeEntities()
    ->includeContributorDetails()
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
