<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Status\HomeTimeline;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new HomeTimeline())
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeReplies()
    ->includeContributorDetails()
    ->excludeEntities()
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
