<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/profile_banner
 */
class ProfileBannerByUserId extends Lookup
{
    public function __construct(int $userId)
    {
        parent::__construct();

        $this->parameters['user_id'] = (string) $userId;
    }
}
