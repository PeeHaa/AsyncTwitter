<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Trends;

use PeeHaa\AsyncTwitter\Api\Request\Trend\Available;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Available());

\Amp\wait($result = $apiClient->request($request));
