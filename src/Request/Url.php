<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Request;

class Url
{
    const BASE_URL = 'https://api.twitter.com/1.1';

    private $path;

    private $parameters = [];

    public function __construct(string $path, Parameter ...$parameters)
    {
        $this->path       = $path;
        $this->parameters = $parameters;
    }

    public function getBaseString(): string
    {
        return self::BASE_URL . $this->path;
    }

    public function getQueryStringParameters(): array
    {
        return $this->parameters;
    }

    public function getUrl(): string
    {
        $url = self::BASE_URL . $this->path;

        if ($this->parameters) {
            $url .= $this->buildQueryString();
        }

        return $url;
    }

    private function buildQueryString(): string
    {
        $parameters = [];

        foreach ($this->parameters as $parameter) {
            $parameters[$parameter->getKey()] = $parameter->getValue();
        }

        return '?' . http_build_query($parameters);
    }
}
