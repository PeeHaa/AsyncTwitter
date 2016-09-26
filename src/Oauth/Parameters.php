<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Oauth;

use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;

class Parameters
{
    private $consumer;

    private $accessToken;

    private $nonce;

    private $timestamp;

    private $signatureMethod;

    private $version;

    private $parameters;

    private $url;

    public function __construct(Application $consumer, AccessToken $accessToken, Url $url, Parameter ...$parameters)
    {
        $this->consumer        = $consumer->getKey();
        $this->accessToken     = $accessToken->getToken();
        $this->nonce           = bin2hex(random_bytes(16));
        $this->timestamp       = (new \DateTimeImmutable())->format('U');
        $this->signatureMethod = 'HMAC-SHA1';
        $this->version         = '1.0';
        $this->parameters      = $parameters;
        $this->url             = $url;
    }

    public function getConsumerKey(): string
    {
        return $this->consumer;
    }

    public function getNonce(): string
    {
        return $this->nonce;
    }

    public function getSignatureMethod(): string
    {
        return $this->signatureMethod;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function getToken(): string
    {
        return $this->accessToken;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getAll(): array
    {
        return array_merge($this->getBaseParameters(), $this->getParameters());
    }

    private function getBaseParameters(): array
    {
        return [
            'oauth_consumer_key'     => $this->consumer,
            'oauth_token'            => $this->accessToken,
            'oauth_nonce'            => $this->nonce,
            'oauth_timestamp'        => $this->timestamp,
            'oauth_signature_method' => $this->signatureMethod,
            'oauth_version'          => $this->version,
        ];
    }

    private function getParameters(): array
    {
        $parameters = [];

        foreach ($this->parameters as $parameter) {
            $parameters[$parameter->getKey()] = $parameter->getValue();
        }

        return $parameters;
    }
}
