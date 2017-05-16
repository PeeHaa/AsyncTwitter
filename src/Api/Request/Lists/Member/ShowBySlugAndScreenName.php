<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists\Member;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class ShowBySlugAndScreenName extends Show
{
    public function __construct(string $slug, int $userId, string $screenName, string $ownerScreenName)
    {
        parent::__construct();

        $this->parameters['slug']              = (string) $slug;
        $this->parameters['user_id']           = (string) $userId;
        $this->parameters['screen_name']       = (string) $screenName;
        $this->parameters['owner_screen_name'] = (string) $ownerScreenName;
    }
}
