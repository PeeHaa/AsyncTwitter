<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Block;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Ids extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/blocks/ids.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function stringifyIds(): Ids
    {
        $this->parameters['stringify_ids'] = 'true';

        return $this;
    }

    public function fromCursor(int $cursor): Ids
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }
}
