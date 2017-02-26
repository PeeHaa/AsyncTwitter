<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Friendship\Incoming;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Incoming())
    ->fromCursor(12893764510938)
    ->stringifyIds()
;

\Amp\wait($result = $apiClient->request($request));
