<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Credentials;

class AccessTokenFactory
{
    public function create(string $token, string $secret): AccessToken
    {
        return new AccessToken($token, $secret);
    }
}
