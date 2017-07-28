<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User\Suggestion;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/suggestions/slug
 */
class Slug extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/suggestions/%s.json';

    public function __construct(string $slug)
    {
        parent::__construct(self::METHOD, sprintf(self::ENDPOINT, $slug));
    }

    public function language(string $lang): Slug
    {
        $this->parameters['lang'] = $lang;

        return $this;
    }
}
