<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Help;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/help/configuration
 */
class Configuration extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/help/configuration.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
