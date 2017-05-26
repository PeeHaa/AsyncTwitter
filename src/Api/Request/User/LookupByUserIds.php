<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/lookup
 */
class LookupByUserIds extends Lookup
{
    public function __construct(array $userIds)
    {
        parent::__construct();

        $this->parameters['user_id'] = implode(',', $userIds);
    }
}
