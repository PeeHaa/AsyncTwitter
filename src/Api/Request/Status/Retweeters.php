<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Retweeters extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/retweeters/ids.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = (string) $id;
    }

    public function cursor(): Destroy
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
