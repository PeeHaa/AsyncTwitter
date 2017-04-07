<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/collections/entries
 */
class Entries extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/collections/entries.json';

    public function __construct(string $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = $id;
    }

    public function amount(int $amount): Entries
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): Entries
    {
        $this->parameters['min_position'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): Entries
    {
        $this->parameters['max_position'] = (string) $id;

        return $this;
    }
}
