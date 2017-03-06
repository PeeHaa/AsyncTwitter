<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Collection\ListByScreenName;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new ListByScreenName('twitterdev'))
    ->tweetId(514533751213551616)
    ->amount(10)
    ->fromCursor('BXb2synCEAE')
;

\Amp\wait($result = $apiClient->request($request));
