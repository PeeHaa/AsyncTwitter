<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/friendships/incoming
 */
class Incoming extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/friendships/incoming.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function fromCursor(int $cursor): Incoming
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }

    public function stringifyIds(): Incoming
    {
        $this->parameters['stringify_ids'] = 'true';

        return $this;
    }
}
