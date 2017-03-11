<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByAuthenticatedUser;
use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByScreenName;
use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByUserId;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new ListByUserId(12345))
    ->reverse()
;

\Amp\wait($result = $apiClient->request($request));

$request = (new ListByScreenName('noradio'))
    ->reverse()
;

\Amp\wait($result = $apiClient->request($request));

$request = (new ListByAuthenticatedUser())
    ->reverse()
;

\Amp\wait($result = $apiClient->request($request));
