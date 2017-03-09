<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Geo\ReverseGeoCode;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new ReverseGeoCode('37.7821120598956', '-122.400612831116'))
    ->accuracy('5ft')
    ->granularity('poi')
    ->amount(5)
;

\Amp\wait($result = $apiClient->request($request));
