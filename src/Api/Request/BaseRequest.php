<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request;

use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;

abstract class BaseRequest implements Request
{
    private $method;

    private $endpoint;

    protected $parameters = [];

    public function __construct(string $method, string $endpoint)
    {
        $this->method   = $method;
        $this->endpoint = $endpoint;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        $parameters = [];

        foreach ($this->parameters as $key => $value) {
            $parameters[] = new Parameter($key, $value);
        }

        return $parameters;
    }

    public function getEndpoint(): Url
    {
        return new Url($this->endpoint);
    }
}
