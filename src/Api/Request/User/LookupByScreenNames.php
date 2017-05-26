<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/lookup
 */
class LookupByScreenNames extends Lookup
{
    public function __construct(array $screenNames)
    {
        parent::__construct();

        $this->parameters['screen_name'] = implode(',', $screenNames);
    }
}
