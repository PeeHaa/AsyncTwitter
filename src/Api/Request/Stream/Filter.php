<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Stream;

/**
 * @link https://dev.twitter.com/streaming/reference/post/statuses/filter
 */
class Filter extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/filter.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function follow(array $users)
    {
        $this->parameters['follow'] = implode(',', $users);

        return $this;
    }

    public function track(array $keywords)
    {
        $this->parameters['track'] = implode(',', $keywords);

        return $this;
    }

    public function locations(array $boxes)
    {
        $this->parameters['locations'] = implode(',', $boxes);

        return $this;
    }
}
