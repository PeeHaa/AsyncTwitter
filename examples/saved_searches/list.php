<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\SavedSearches;

use PeeHaa\AsyncTwitter\Api\Request\SavedSearch\Lists;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new Lists());

\Amp\wait($result = $apiClient->request($request));
