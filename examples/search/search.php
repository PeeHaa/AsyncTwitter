<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Search\Search;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Search('php'))
    ->geocode('37.781157', '-122.398720', '1mi')
    ->languages('en')
    ->locale()
    ->resultType('recent')
    ->amount(13)
    ->until(new \DateTime('13-12-2016'))
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeEntities()
;

\Amp\wait($apiClient->request($request));
