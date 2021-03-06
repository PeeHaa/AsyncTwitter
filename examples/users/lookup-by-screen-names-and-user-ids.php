<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Users;

use PeeHaa\AsyncTwitter\Api\Request\User\LookupByScreenNamesAndUserIds;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new LookupByScreenNamesAndUserIds(['PHPeeHaa'], [12345]))
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
