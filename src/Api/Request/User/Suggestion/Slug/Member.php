<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User\Suggestion\Slug;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/suggestions/slug/members
 */
class Member extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/suggestions/%s/members.json';

    public function __construct(string $slug)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $slug));
    }
}
