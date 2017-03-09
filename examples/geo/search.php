<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Geo\Search;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Search())
    ->latitude('37.7821120598956')
    ->longitude('122.400612831116')
    ->query('Twitter HQ')
    ->ip('74.125.19.104')
    ->granularity('poi')
    ->accuracy('5ft')
    ->amount(5)
    ->containedWithin('247f43d441defc03')
    ->streetAddress('795 Folsom St')
;

\Amp\wait($result = $apiClient->request($request));
