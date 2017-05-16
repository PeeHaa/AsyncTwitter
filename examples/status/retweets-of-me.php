<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\RetweetsOfMe;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new RetweetsOfMe())
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeEntities()
    ->excludeUserEntities()
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
