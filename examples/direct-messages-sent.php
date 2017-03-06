<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\DirectMessage\Sent;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Sent())
    ->minimumId(12345)
    ->maximumId(54321)
    ->amount(5)
    ->page(3)
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
