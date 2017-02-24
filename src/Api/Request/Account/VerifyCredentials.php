<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class VerifyCredentials extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/account/verify_credentials.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function excludeEntities(): VerifyCredentials
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }

    public function skipStatus(): VerifyCredentials
    {
        $this->parameters['skip_status'] = 'true';

        return $this;
    }

    public function includeEmail(): VerifyCredentials
    {
        $this->parameters['include_email'] = 'true';

        return $this;
    }
}
