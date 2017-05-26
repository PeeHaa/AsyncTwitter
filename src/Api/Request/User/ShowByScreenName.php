<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/show
 */
class ShowByScreenName extends Show
{
    public function __construct(string $screenName)
    {
        parent::__construct();

        $this->parameters['screen_name'] = $screenName;
    }
}
