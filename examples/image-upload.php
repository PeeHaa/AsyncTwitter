<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use PeeHaa\AsyncTwitter\Api\Request\Media\Response\UploadResponse;
use PeeHaa\AsyncTwitter\Api\Request\Media\Upload;
use PeeHaa\AsyncTwitter\Api\Request\Status\Update;

require_once __DIR__ . '/../vendor/autoload.php';

$apiClient = require __DIR__ . '/create-client.php';

\Amp\run(function() use($apiClient) {
    $request = (new Upload)
        ->setFilePath('/path/to/file.jpg')
    ;

    /** @var UploadResponse $response */
    $response = yield $apiClient->request($request);

    $request = (new Update('This is a tweet with a picture attached'))
        ->setMediaIds($response->getMediaId());
    ;

    yield $apiClient->request($request);
});
