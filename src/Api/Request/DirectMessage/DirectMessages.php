<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class DirectMessages extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/direct_messages.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function minimumId(int $id): DirectMessages
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): DirectMessages
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function amount(int $amount): DirectMessages
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function excludeEntities(): DirectMessages
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function skipStatus(): DirectMessages
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }
}
