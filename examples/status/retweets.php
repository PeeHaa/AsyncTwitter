<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Retweets;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Retweets(773866378172440576))
    ->amount(10)
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
