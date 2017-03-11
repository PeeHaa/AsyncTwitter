<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

abstract class Lists extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/lists/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function reverse(): Lists
    {
        $this->parameters['reverse'] = 'true';

        return $this;
    }
}
