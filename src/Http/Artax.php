<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Http;

use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\FormBody;
use Amp\Promise;
use PeeHaa\AsyncTwitter\Exception;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\FieldParameter;
use PeeHaa\AsyncTwitter\Request\FileParameter;
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
        $body = $this->getFormBody($body);

        $request = (new Request($url->getUrl()))
            ->withMethod('POST')
            ->withHeader('Authorization', $header->getHeader())
            ->withBody($body)
        ;

        $options = [];
        if ($flags & Client::OP_STREAM) {
            $options[ArtaxClient::OP_TRANSFER_TIMEOUT] = -1;
        }

        return $this->client->request($request, $options);
    }

    private function getFormBody(Body $body): FormBody
    {
        $formBody = new FormBody();

        foreach ($body->getParameters() as $parameter) {
            if ($parameter instanceof FieldParameter) {
                $formBody->addField($parameter->getKey(), $parameter->getValue(), $parameter->getType());
            } else if ($parameter instanceof FileParameter) {
                $formBody->addFile($parameter->getKey(), $parameter->getPath(), $parameter->getType());
            } else {
                throw new Exception("Unexpected parameter type: " . get_class($parameter));
            }
        }

        return $formBody;
    }

    public function get(Url $url, Header $header, array $parameters, int $flags = 0): Promise
    {
        $request = (new Request($url->getUrl() . $this->buildQueryString(...$parameters)))
            ->withMethod('GET')
            ->withAllHeaders(['Authorization' => $header->getHeader()])
        ;

        $options = [];
        if ($flags & Client::OP_STREAM) {
            $options[ArtaxClient::OP_TRANSFER_TIMEOUT] = -1;
        }

        return $this->client->request($request, $options);
    }

    private function buildQueryString(Parameter ...$parameters): string
    {
        $queryString = [];

        foreach ($parameters as $parameter) {
            if (!$parameter instanceof FieldParameter) {
                throw new Exception("Unexpected parameter type: " . get_class($parameter));
            }

            $queryString[$parameter->getKey()] = $parameter->getValue();
        }

        return '?' . http_build_query($queryString);
    }
}
