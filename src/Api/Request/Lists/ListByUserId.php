<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

class ListByUserId extends Lists
{
    public function __construct(int $userId)
    {
        parent::__construct();

        $this->parameters['user_id'] = (string) $userId;
    }
}
