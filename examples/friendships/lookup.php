<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Friendship\Lookup;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Lookup())
    ->userIds([12345, 12346])
    ->screenNames(['noradio', 'twitterdev'])
;

\Amp\wait($result = $apiClient->request($request));
