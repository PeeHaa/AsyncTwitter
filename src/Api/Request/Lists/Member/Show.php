<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists\Member;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members/show
 */
abstract class Show extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/lists/members/show.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): Show
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function fromCursor(int $cursor): Show
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }

    public function includeEntities(): Show
    {
        $this->parameters['include_entities'] = 'true';

        return $this;
    }

    public function skipStatus(): Show
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }
}
