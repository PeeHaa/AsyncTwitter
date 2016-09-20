<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Oauth\Signature;

class Signature
{
    private $baseString;

    private $key;

    public function __construct(BaseString $baseString, Key $key)
    {
        $this->baseString = $baseString->getString();
        $this->key        = $key->getKey();
    }

    public function getSignature(): string
    {
        return rawurlencode(base64_encode(hash_hmac('sha1', $this->baseString, $this->key, true)));
    }
}
