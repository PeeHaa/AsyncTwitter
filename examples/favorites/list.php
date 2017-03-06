<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Favorites;

use PeeHaa\AsyncTwitter\Api\Request\Favorite\Overview;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Overview())
    ->userId(12345)
    ->screenname('noradio')
    ->amount(5)
    ->minimumId(12345)
    ->maximumId(54321)
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
