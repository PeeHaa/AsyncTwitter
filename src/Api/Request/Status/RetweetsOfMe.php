<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\BaseRequest;

class RetweetsOfMe extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/retweets_of_me.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): RetweetsOfMe
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): RetweetsOfMe
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): RetweetsOfMe
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function trimUser(): RetweetsOfMe
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }

    public function excludeEntities(): RetweetsOfMe
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function excludeUserEntities(): RetweetsOfMe
    {
        $this->parameters['include_user_entities'] = 'false';

        return $this;
    }
}
