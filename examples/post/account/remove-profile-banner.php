<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Post\Account;

use PeeHaa\AsyncTwitter\Api\Request\Post\Account\RemoveProfileBanner;

require_once __DIR__ . '/../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../create-client.php';

$request = new RemoveProfileBanner();

\Amp\wait($result = $apiClient->request($request));
