<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/friendships/show
 */
class Show extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/friendships/show.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function sourceUserId(int $id): Show
    {
        $this->parameters['source_id'] = (string) $id;

        return $this;
    }

    public function sourceScreenName(string $screenName): Show
    {
        $this->parameters['source_screen_name'] = $screenName;

        return $this;
    }

    public function targetUserId(int $id): Show
    {
        $this->parameters['target_id'] = (string) $id;

        return $this;
    }

    public function targetScreenName(string $screenName): Show
    {
        $this->parameters['target_screen_name'] = $screenName;

        return $this;
    }
}
