<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use PeeHaa\AsyncTwitter\Api\Request;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;

class Retweet implements Request
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/retweet/%s.json';

    private $id;

    private $parameters = [];

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getBody(): Body
    {
        $parameters = [];

        foreach ($this->parameters as $key => $value) {
            $parameters[] = new Parameter($key, $value);
        }

        return new Body(...$parameters);
    }

    public function getEndpoint(): Url
    {
        return new Url(sprintf(self::ENDPOINT, $this->id));
    }

    public function trimUser(): Retweet
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
