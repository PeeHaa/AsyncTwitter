<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Collection\Entries;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Entries('custom-539487832448843776'))
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
;

\Amp\wait($result = $apiClient->request($request));
