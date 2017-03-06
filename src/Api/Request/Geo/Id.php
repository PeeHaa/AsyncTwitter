<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Id extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/geo/id/%s.json';

    public function __construct(string $id)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $id));
    }
}
