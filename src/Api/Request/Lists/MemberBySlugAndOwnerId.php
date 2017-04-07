<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class MemberBySlugAndOwnerId extends Member
{
    public function __construct(string $slug, int $ownerId)
    {
        parent::__construct();

        $this->parameters['slug']     = $slug;
        $this->parameters['owner_id'] = (string) $ownerId;
    }
}
