<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\DirectMessage\DirectMessages;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new DirectMessages())
    ->minimumId(12345)
    ->maximumId(54321)
    ->amount(5)
    ->excludeEntities()
    ->skipStatus()
;

\Amp\wait($result = $apiClient->request($request));
