<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Request;

class Url
{
    private $url;

    private $path;

    private $parameters = [];

    public function __construct(string $url, string $path, Parameter ...$parameters)
    {
        $this->url        = $url;
        $this->path       = $path;
        $this->parameters = $parameters;
    }

    public function getBaseString(): string
    {
        return $this->url . $this->path;
    }

    public function getQueryStringParameters(): array
    {
        return $this->parameters;
    }

    public function getUrl(): string
    {
        $url = $this->url . $this->path;

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
