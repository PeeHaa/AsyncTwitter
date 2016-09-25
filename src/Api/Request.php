<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api;

use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Url;

interface Request
{
    public function getMethod(): string;

    public function getBody(): Body;

    public function getEndpoint(): Url;
}
