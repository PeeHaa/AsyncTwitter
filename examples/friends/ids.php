<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Favorites;

use PeeHaa\AsyncTwitter\Api\Request\Friend\Ids;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Ids())
    ->userId(12345)
    ->screenname('noradio')
    ->fromCursor(12893764510938)
    ->stringifyIds()
    ->amount(5)
;

\Amp\wait($result = $apiClient->request($request));
