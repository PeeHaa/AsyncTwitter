<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Account;

use PeeHaa\AsyncTwitter\Api\Request\Account\VerifyCredentials;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new VerifyCredentials())
    ->excludeEntities()
    ->skipStatus()
    ->includeEmail()
;

\Amp\wait($result = $apiClient->request($request));
