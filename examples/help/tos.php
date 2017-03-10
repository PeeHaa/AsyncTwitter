<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Help;

use PeeHaa\AsyncTwitter\Api\Request\Help\TermsOfService;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = new TermsOfService();

\Amp\wait($result = $apiClient->request($request));
