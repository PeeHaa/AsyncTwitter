<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Stream;

use PeeHaa\AsyncTwitter\Api\Request\Request as ApiRequest;

interface Request extends ApiRequest
{
    const LEVEL_NONE = 'none';
    const LEVEL_LOW = 'low';
    const LEVEL_MEDIUM = 'medium';

    function filterLevel(string $level);
    function language(array $languages);
}
