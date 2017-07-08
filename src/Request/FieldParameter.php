<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Request;

class FieldParameter extends Parameter
{
    private $value;

    public function __construct(string $key, string $value, string $type = 'text/plain')
    {
        parent::__construct($key, $type);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
