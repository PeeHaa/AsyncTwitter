<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Account;

use PeeHaa\AsyncTwitter\Api\Request\Account\Settings;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = new Settings();

\Amp\wait($result = $apiClient->request($request));
