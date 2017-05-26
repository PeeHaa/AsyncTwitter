<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Mute\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/mutes/users/ids
 */
class Ids extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/mutes/users/ids.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function cursor(int $cursor): Ids
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }
}
