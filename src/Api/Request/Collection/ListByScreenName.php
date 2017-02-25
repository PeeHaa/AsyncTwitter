<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Collection;

class ListByScreenName extends Lists
{
    public function __construct(string $screenName)
    {
        parent::__construct();

        $this->parameters['screen_name'] = $screenName;
    }
}
