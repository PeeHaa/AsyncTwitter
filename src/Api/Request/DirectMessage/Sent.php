<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Sent extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/direct_messages/sent.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function minimumId(int $id): Sent
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): Sent
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function amount(int $amount): Sent
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function page(int $page): Sent
    {
        $this->parameters['page'] = (string) $page;

        return $this;
    }

    public function excludeEntities(): Sent
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
