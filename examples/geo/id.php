<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Geo\Id;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = new Id('df51dec6f4ee2b2c');

\Amp\wait($result = $apiClient->request($request));
