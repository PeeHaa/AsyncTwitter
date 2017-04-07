<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/statuses/show/id
 */
class Show extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/show.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = (string) $id;
    }

    public function trimUser(): Show
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }

    public function excludeEntities(): Show
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function includeUserRetweetStatus(): Show
    {
        $this->parameters['include_my_retweet'] = 'true';

        return $this;
    }
}
