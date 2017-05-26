<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/trends/available
 */
class Available extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/trends/available.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
