<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Mute\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/mutes/users/list
 */
class Lists extends BaseRequest
{
    const METHOD = 'GET';
    const ENDPOINT = '/mutes/users/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function cursor(int $cursor): Lists
    {
        $this->parameters['cursor'] = (string)$cursor;

        return $this;
    }

    public function excludeEntities(): Lists
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function skipStatus(): Lists
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }
}
