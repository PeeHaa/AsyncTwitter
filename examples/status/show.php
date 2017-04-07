<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Show;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Show(210462857140252672))
    ->trimUser()
    ->excludeEntities()
    ->includeUserRetweetStatus()
;

\Amp\wait($apiClient->request($request));
