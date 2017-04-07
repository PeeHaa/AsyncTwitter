<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Help;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/help/tos
 */
class TermsOfService extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/help/tos.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
