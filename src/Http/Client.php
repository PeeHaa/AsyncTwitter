<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Http;

use Amp\Promise;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PeeHaa\AsyncTwitter\Oauth\Header;

interface Client
{
    public function post(Url $url, Header $header, Body $body): Promise;

    public function get(Url $url, Header $header, Parameter ...$parameters): Promise;
}
