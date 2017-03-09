<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples\Collections;

use PeeHaa\AsyncTwitter\Api\Request\Collection\Show;

require_once __DIR__ . '/../../vendor/autoload.php';

$apiClient = require __DIR__ . '/../create-client.php';

$request = new Show('custom-388061495298244609');

\Amp\wait($result = $apiClient->request($request));

var_dump($result);
