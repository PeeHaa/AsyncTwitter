<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/search
 */
class Search extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/search.json';

    public function __construct($keywords)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['q'] = $keywords;
    }

    public function page(int $page): Search
    {
        $this->parameters['page'] = (string) $page;

        return $this;
    }

    public function amount(int $amount): Search
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function excludeEntities(): Search
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
