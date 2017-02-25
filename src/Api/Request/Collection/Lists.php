<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

abstract class Lists extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/collections/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): Lists
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function tweetId(int $tweetId): Lists
    {
        $this->parameters['tweet_id'] = (string) $tweetId;

        return $this;
    }

    public function fromCursor(string $cursor): Lists
    {
        $this->parameters['cursor'] = $cursor;

        return $this;
    }
}
