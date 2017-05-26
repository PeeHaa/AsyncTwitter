<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/trends/place
 */
class Place extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/trends/place.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = (string) $id;
    }

    public function excludeHashTags(): Place
    {
        $this->parameters['exclude'] = 'hashtags';

        return $this;
    }
}
