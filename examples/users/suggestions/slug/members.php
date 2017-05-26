<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Users\Suggestions\Slug;

use PeeHaa\AsyncTwitter\Api\Request\User\Suggestion\Slug\Member;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../../create-client.php';

$request = (new Member('twitter'));

\Amp\wait($result = $apiClient->request($request));
