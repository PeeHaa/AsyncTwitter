<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Mute\Users;

use PeeHaa\AsyncTwitter\Api\Request\Mute\User\Ids;

require_once __DIR__ . '/../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../create-client.php';

$request = (new Ids())
    ->cursor(1)
;

\Amp\wait($result = $apiClient->request($request));
