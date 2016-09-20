<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Oauth\Signature;

use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;

class Key
{
    private $consumerSecret;

    private $tokenSecret;

    public function __construct(Application $consumer, AccessToken $accessToken)
    {
        $this->consumerSecret = $consumer->getSecret();
        $this->tokenSecret    = $accessToken->getSecret();
    }

    public function getKey(): string
    {
        return sprintf('%s&%s', $this->consumerSecret, $this->tokenSecret);
    }
}
