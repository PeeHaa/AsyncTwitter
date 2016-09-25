<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Http;

use Amp\Artax\Client;
use Amp\Promise;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Url;
use PeeHaa\AsyncTwitter\Oauth\Header;
use Amp\Artax\Request;

class Artax
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function post(Url $url, Header $header, Body $body): Promise
    {
        $request = (new Request)
            ->setMethod('POST')
            ->setUri($url->getUrl())
            ->setAllHeaders([
                'Authorization' => $header->getHeader(),
                'Content-Type'  => 'application/x-www-form-urlencoded',
            ])
            ->setBody($this->getBodyString($body))
        ;

        return $this->client->request($request);
    }

    private function getBodyString(Body $body): string
    {
        $bodyString = '';
        $delimiter  = '';

        foreach ($body->getParameters() as $parameter) {
            $bodyString .= $delimiter . $parameter->getKey() . '=' . rawurlencode($parameter->getValue());

            $delimiter = '&';
        }

        return $bodyString;
    }
}
