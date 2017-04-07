<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/account/settings
 */
class Settings extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/account/settings.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
