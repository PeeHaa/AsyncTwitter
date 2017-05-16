<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Friendship\NoRetweet;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/friendships/no_retweets/ids
 */
class Ids extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/friendships/no_retweets/ids.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function stringifyIds(): Ids
    {
        $this->parameters['stringify_ids'] = 'true';

        return $this;
    }
}
