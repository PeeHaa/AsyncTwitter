<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists\Member;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
class ShowByListId extends Show
{
    public function __construct(int $listId, int $userId, string $screenName)
    {
        parent::__construct();

        $this->parameters['list_id']     = (string) $listId;
        $this->parameters['user_id']     = (string) $userId;
        $this->parameters['screen_name'] = (string) $screenName;
    }
}
