<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Trends;

use PeeHaa\AsyncTwitter\Api\Request\Trend\Closest;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Closest('37.781157', '-122.400612831116'));

\Amp\wait($result = $apiClient->request($request));
