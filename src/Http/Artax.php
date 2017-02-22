<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Http;

use Amp\Artax\Client as ArtaxClient;
use Amp\Promise;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PeeHaa\AsyncTwitter\Oauth\Header;
use Amp\Artax\Request;

class Artax implements Client
{
    private $client;

    public function __construct(ArtaxClient $client)
    {
        $this->client = $client;
    }

    public function post(Url $url, Header $header, Body $body, int $flags = 0): Promise
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

        $options = [];
        if ($flags & Client::OP_STREAM) {
            $options[ArtaxClient::OP_MS_TRANSFER_TIMEOUT] = -1;
        }

        return $this->client->request($request, $options);
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

    public function get(Url $url, Header $header, array $parameters, int $flags = 0): Promise
    {
        $request = (new Request)
            ->setMethod('GET')
            ->setUri($url->getUrl() . $this->buildQueryString(...$parameters))
            ->setAllHeaders(['Authorization' => $header->getHeader()])
        ;

        $options = [];
        if ($flags & Client::OP_STREAM) {
            $options[ArtaxClient::OP_MS_TRANSFER_TIMEOUT] = -1;
        }

        return $this->client->request($request, $options);
    }

    private function buildQueryString(Parameter ...$parameters): string
    {
        $queryString = [];

        foreach ($parameters as $parameter) {
            $queryString[$parameter->getKey()] = $parameter->getValue();
        }

        return '?' . http_build_query($queryString);
    }
}
