<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Oauth;

use PeeHaa\AsyncTwitter\Oauth\Signature\Signature;

class Header
{
    private $parameters;

    private $signature;

    public function __construct(Parameters $parameters, Signature $signature)
    {
        $this->parameters = $parameters;
        $this->signature  = $signature;
    }

    public function getHeader(): string
    {
        $header = 'OAuth ';
        $header.= 'oauth_consumer_key="' . $this->parameters->getConsumerKey() . '", ';
        $header.= 'oauth_nonce="' . $this->parameters->getNonce() . '", ';
        $header.= 'oauth_signature="' . $this->signature->getSignature() . '", ';
        $header.= 'oauth_signature_method="' . $this->parameters->getSignatureMethod() . '", ';
        $header.= 'oauth_timestamp="' . $this->parameters->getTimestamp() . '", ';
        $header.= 'oauth_token="' . $this->parameters->getToken() . '", ';
        $header.= 'oauth_version="' . $this->parameters->getVersion() . '"';

        return $header;
    }
}
