<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Help;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Language extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/help/languages.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }
}
