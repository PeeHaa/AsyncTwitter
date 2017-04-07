<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Follower;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/followers/ids
 */
class Ids extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/followers/ids.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function userId(int $id): Ids
    {
        $this->parameters['user_id'] = (string) $id;

        return $this;
    }

    public function screenName(string $screenName): Ids
    {
        $this->parameters['screen_name'] = $screenName;

        return $this;
    }

    public function fromCursor(int $cursor): Ids
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }

    public function stringifyIds(): Ids
    {
        $this->parameters['stringify_ids'] = 'true';

        return $this;
    }

    public function amount(int $amount): Ids
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }
}
