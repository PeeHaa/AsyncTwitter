<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists\Member;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class ShowBySlugAndOwnerId extends Show
{
    public function __construct(string $slug, int $userId, string $screenName, int $ownerId)
    {
        parent::__construct();

        $this->parameters['slug']        = (string) $slug;
        $this->parameters['user_id']     = (string) $userId;
        $this->parameters['screen_name'] = (string) $screenName;
        $this->parameters['owner_id']    = (string) $ownerId;
    }
}
