<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/show
 */
abstract class Show extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/show.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function excludeEntities(): Show
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
