<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/show
 */
class ShowByUserId extends Show
{
    public function __construct(int $userId)
    {
        parent::__construct();

        $this->parameters['user_id'] = (string) $userId;
    }
}
