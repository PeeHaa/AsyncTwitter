<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Request;

class FileParameter extends Parameter
{
    private $path;

    public function __construct(string $key, string $path, string $type = 'application/octet-stream')
    {
        parent::__construct($key, $type);

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
