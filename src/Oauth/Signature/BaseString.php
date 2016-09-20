<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Oauth\Signature;

use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Request\Url;

class BaseString
{
    private $method;

    private $url;

    private $parameters;

    public function __construct(string $method, Url $url, Parameters $parameters)
    {
        $this->method     = strtoupper($method);
        $this->url        = $url;
        $this->parameters = $parameters;
    }

    public function getString(): string
    {
        return sprintf('%s&%s&%s', $this->method, $this->getBaseString(), $this->getOauthParameters());
    }

    private function getBaseString(): string
    {
        return rawurlencode($this->url->getBaseString());
    }

    private function getOauthParameters(): string
    {
        $oauthParameters = array_map('rawurlencode', $this->parameters->getAll());

        asort($oauthParameters);
        ksort($oauthParameters);

        // we are first `urldecode`ing the value, because `http_build_query` converts spaces to +
        return rawurlencode(urldecode(http_build_query($oauthParameters, '', '&')));
    }
}
