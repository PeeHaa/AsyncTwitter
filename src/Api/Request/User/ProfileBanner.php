<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/profile_banner
 */
abstract class ProfileBanner extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/profile_banner.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
