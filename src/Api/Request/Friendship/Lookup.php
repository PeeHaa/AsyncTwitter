<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Lookup extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/friendships/lookup.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function userIds(array $ids): Lookup
    {
        $this->parameters['user_id'] = implode(',', $ids);

        return $this;
    }

    public function screenNames(array $screenNames): Lookup
    {
        $this->parameters['screen_name'] = implode(',', $screenNames);

        return $this;
    }
}
