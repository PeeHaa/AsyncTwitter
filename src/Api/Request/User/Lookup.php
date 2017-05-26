<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/lookup
 */
abstract class Lookup extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/lookup.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function excludeEntities(): Lookup
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
