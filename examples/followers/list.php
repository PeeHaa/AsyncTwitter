<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Followers;

use PeeHaa\AsyncTwitter\Api\Request\Follower\Overview;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Overview())
    ->userId(12345)
    ->screenname('noradio')
    ->fromCursor(12893764510938)
    ->amount(5)
    ->skipStatus()
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
