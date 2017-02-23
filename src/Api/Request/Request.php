<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request;

use PeeHaa\AsyncTwitter\Request\Url;

interface Request
{
    public function getMethod(): string;

    public function getParameters(): array;

    public function getEndpoint(): Url;

    public function handleResponse(array $responseData);
}
