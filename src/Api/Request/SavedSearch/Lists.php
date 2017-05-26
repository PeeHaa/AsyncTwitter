<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\SavedSearch;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://api.twitter.com/1.1/saved_searches/list.json
 */
class Lists extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/saved_searches/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
