<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Users;

use PeeHaa\AsyncTwitter\Api\Request\User\Search;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Search('peehaa'))
    ->page(1)
    ->amount(10)
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
