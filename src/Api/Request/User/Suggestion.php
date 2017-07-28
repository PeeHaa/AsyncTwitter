<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/users/suggestions
 */
class Suggestion extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/users/suggestions.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function language(string $lang): Suggestion
    {
        $this->parameters['lang'] = $lang;

        return $this;
    }
}
