<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Mute\Users;

use PeeHaa\AsyncTwitter\Api\Request\Mute\User\Lists;

require_once __DIR__ . '/../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../create-client.php';

$request = (new Lists())
    ->cursor(1)
    ->skipStatus()
    ->excludeEntities()
;

\Amp\wait($result = $apiClient->request($request));
