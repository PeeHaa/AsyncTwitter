<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\DirectMessage\Show;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = new Show(587424932);

\Amp\wait($result = $apiClient->request($request));
