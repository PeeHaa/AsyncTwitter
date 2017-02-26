<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Friendship\Show;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Show())
    ->targetUserId(12345)
    ->sourceUserId(12346)
;

\Amp\wait($result = $apiClient->request($request));

$request = (new Show())
    ->sourceScreenName('noradio')
    ->targetScreenName('twitterdev')
;

\Amp\wait($result = $apiClient->request($request));

