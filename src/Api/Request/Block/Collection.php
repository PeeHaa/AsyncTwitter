<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Block;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/blocks/list
 */
class Collection extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/blocks/list.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function excludeEntities(): Collection
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function skipStatus(): Collection
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }

    public function fromCursor(int $cursor): Collection
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }
}
