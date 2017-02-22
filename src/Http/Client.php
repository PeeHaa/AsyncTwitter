<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Http;

use Amp\Promise;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PeeHaa\AsyncTwitter\Oauth\Header;

interface Client
{
    const OP_STREAM = 1;

    public function post(Url $url, Header $header, Body $body, int $flags = 0): Promise;

    /**
     * @param Url $url
     * @param Header $header
     * @param Parameter[] $parameters
     * @param int $flags
     * @return Promise
     */
    public function get(Url $url, Header $header, array $parameters, int $flags = 0): Promise;
}
