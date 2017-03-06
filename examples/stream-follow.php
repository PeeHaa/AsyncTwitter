<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Stream\Filter;
use PeeHaa\AsyncTwitter\Api\Stream;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

$request = (new Filter)
    ->follow(['2436389418'])
;

\Amp\run(function() use($apiClient, $request) {
    /** @var Stream $stream */
    $stream = yield $apiClient->request($request);

    while (null !== $status = yield $stream->read()) {
        var_dump($status);
    }
});
