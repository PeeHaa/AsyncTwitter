<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Favorite;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Overview extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/favorites/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function userId(int $id): Overview
    {
        $this->parameters['user_id'] = (string) $id;

        return $this;
    }

    public function screenName(string $screenName): Overview
    {
        $this->parameters['screen_name'] = $screenName;

        return $this;
    }

    public function amount(int $amount): Overview
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): Overview
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): Overview
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function excludeEntities(): Overview
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
