<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\SavedSearches\Show;

use PeeHaa\AsyncTwitter\Api\Request\SavedSearch\Show\Id;

require_once __DIR__ . '/../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../create-client.php';

$request = (new Id(12));

\Amp\wait($result = $apiClient->request($request));
