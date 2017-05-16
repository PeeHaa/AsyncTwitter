<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Application;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/application/rate_limit_status
 */
class RateLimitStatus extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/application/rate_limit_status.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function filterResources(array $resources): RateLimitStatus
    {
        $this->parameters['resources'] = implode(',', $resources);

        return $this;
    }
}
