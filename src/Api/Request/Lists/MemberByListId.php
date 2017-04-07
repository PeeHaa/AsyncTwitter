<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class MemberByListId extends Member
{
    public function __construct(int $listId)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['list_id'] = (string) $listId;
    }
}
