<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/lists/members
 */
abstract class Member extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/lists/members.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): Member
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function fromCursor(int $cursor): Member
    {
        $this->parameters['cursor'] = (string) $cursor;

        return $this;
    }

    public function excludeEntities(): Member
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function skipStatus(): Member
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }
}
