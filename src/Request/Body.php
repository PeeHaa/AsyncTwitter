<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Request;

class Body
{
    private $parameters = [];

    public function __construct(Parameter ...$parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
