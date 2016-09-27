<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use PeeHaa\AsyncTwitter\Api\BaseRequest;

class Retweets extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/retweets/%d.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $id));
    }

    public function amount(int $amount): Retweets
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function trimUser(): Retweets
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
