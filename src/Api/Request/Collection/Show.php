<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/collections/show
 */
class Show extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/collections/show.json';

    public function __construct(string $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = $id;
    }
}
