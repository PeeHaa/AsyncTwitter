<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/friendships/outgoing
 */
class Outgoing extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/friendships/outgoing.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function fromCursor(int $cursor): Outgoing
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }

    public function stringifyIds(): Outgoing
    {
        $this->parameters['stringify_ids'] = 'true';

        return $this;
    }
}
