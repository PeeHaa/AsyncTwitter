<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class MemberBySlugAndScreenName extends Member
{
    public function __construct(string $slug, string $screenName)
    {
        parent::__construct();

        $this->parameters['slug']              = $slug;
        $this->parameters['owner_screen_name'] = $screenName;
    }
}
