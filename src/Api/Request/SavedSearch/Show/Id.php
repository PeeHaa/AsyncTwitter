<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\SavedSearch\Show;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/saved_searches/show/id
 */
class Id extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/saved_searches/show/%s.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $id));
    }
}
