<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/trends/closest
 */
class Closest extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/trends/closest.json';

    public function __construct(string $latitude, string $longitude)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['lat']  = $latitude;
        $this->parameters['long'] = $longitude;
    }
}
