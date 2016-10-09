<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\BaseRequest;

class Retweet extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/retweet/%s.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $id));
    }

    public function trimUser(): Retweet
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
