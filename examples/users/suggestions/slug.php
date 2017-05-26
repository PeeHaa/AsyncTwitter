<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Users\Suggestions;

use PeeHaa\AsyncTwitter\Api\Request\User\Suggestion\Slug;

require_once __DIR__ . '/../../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../../create-client.php';

$request = (new Slug('twitter'))
    ->lang('en')
;

\Amp\wait($result = $apiClient->request($request));
