<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Status\Update;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Update('@Ocramius I never liked that room anyway'))
    ->replyTo(779461458715406336)
    ->isSensitive()
    ->setLatitude(41.721286)
    ->setLongitude(-87.6785337)
    ->displayCoordinates()
    ->trimUser()
;

\Amp\wait($apiClient->request($request));
