<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Post\Account;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/post/account/remove_profile_banner
 */
class RemoveProfileBanner extends BaseRequest
{
    const METHOD   = 'POST';

    const ENDPOINT = '/account/remove_profile_banner.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
