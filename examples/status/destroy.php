<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Destroy;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Destroy(789019501211840512))
    ->trimUser()
;

\Amp\wait($apiClient->request($request));
