<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberByListId;
use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberBySlugAndOwnerId;
use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberBySlugAndScreenName;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = (new MemberByListId(12345))
    ->amount(10)
    ->fromCursor(123456)
    ->excludeEntities()
    ->skipStatus()
;

\Amp\wait($result = $apiClient->request($request));

$request = (new MemberBySlugAndScreenName('the-slug', 'PeeHaa'))
    ->amount(10)
    ->fromCursor(123456)
    ->excludeEntities()
    ->skipStatus()
;

\Amp\wait($result = $apiClient->request($request));

$request = (new MemberBySlugAndOwnerId('the-slug', 37463754376))
    ->amount(10)
    ->fromCursor(123456)
    ->excludeEntities()
    ->skipStatus()
;

\Amp\wait($result = $apiClient->request($request));
