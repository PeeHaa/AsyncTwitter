<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api;

use Amp\Promise;

interface Stream
{
    function read(): Promise;
    function close();
}
