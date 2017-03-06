<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Application\RateLimitStatus;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new RateLimitStatus())
    ->filterResources([
        'statuses',
        'friends',
        'trends',
        'help',
    ])
;

\Amp\wait($result = $apiClient->request($request));
