<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\MentionsTimeline;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new MentionsTimeline())
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeEntities()
    ->includeContributorDetails()
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
