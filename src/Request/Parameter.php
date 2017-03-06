<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Request;

abstract class Parameter
{
    private $key;

    private $type;

    public function __construct(string $key, string $type = 'text/plain')
    {
        $this->key   = $key;
        $this->type = $type;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
