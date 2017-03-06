<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Status\Retweet;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Retweet(780075575276863488))->trimUser();

\Amp\wait($apiClient->request($request));
