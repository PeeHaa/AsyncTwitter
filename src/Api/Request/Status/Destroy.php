<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/post/statuses/destroy/id
 */
class Destroy extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/destroy/%s.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $id));
    }

    public function trimUser(): Destroy
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
