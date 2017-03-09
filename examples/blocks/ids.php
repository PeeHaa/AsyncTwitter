<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Blocks;

use PeeHaa\AsyncTwitter\Api\Request\Block\Ids;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Ids())
    ->stringifyIds()
    ->fromCursor(1200)
;

\Amp\wait($result = $apiClient->request($request));
