<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/profile_banner
 */
class ProfileBannerByScreenName extends ProfileBanner
{
    public function __construct(string $screenName)
    {
        parent::__construct();

        $this->parameters['screen_name'] = $screenName;
    }
}
