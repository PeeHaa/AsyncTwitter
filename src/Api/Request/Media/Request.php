<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Media;

use PeeHaa\AsyncTwitter\Api\Request\Request as ApiRequest;

interface Request extends ApiRequest
{
    function setFilePath(string $content);
}
