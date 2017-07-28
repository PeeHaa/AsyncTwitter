<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Http;

use Amp\Artax\Client;
use Amp\Artax\Request;
use Amp\Success;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
use PeeHaa\AsyncTwitter\Http\Client as AsyncTwitterHttpClient;
use PeeHaa\AsyncTwitter\Oauth\Header;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Oauth\Signature\BaseString;
use PeeHaa\AsyncTwitter\Oauth\Signature\Key;
use PeeHaa\AsyncTwitter\Oauth\Signature\Signature;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\FieldParameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class ArtaxTest extends TestCase
{
    private $clientMock;

    private $url;

    private $parameters;

    private $header;

    public function setUp()
    {
        $this->clientMock = $this->createMock(Client::class);
        $this->url        = new Url('https://api.twitter.com/1.1', '/statuses/endpoint');

        $oAuthParameters = new Parameters(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret'),
            new Url('https://api.twitter.com/1.1', '/statuses/endpoint'),
            ...[new FieldParameter('key1', 'value1')]
        );

        $signature = new Signature(
            new BaseString('POST', new Url('https://api.twitter.com/1.1', '/statuses/endpoint'), $oAuthParameters),
            new Key(new Application('ApplicationKey', 'ApplicationSecret'), new AccessToken('AccessToken', 'AccessSecret'))
        );

        $this->header = new Header($oAuthParameters, $signature);

        $this->parameters = [
            new FieldParameter('param1', 'value1'),
            new FieldParameter('param2', 'value2'),
            new FieldParameter('param3', 'value3'),
        ];
    }

    public function testPost()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('request')
            ->with($this->isInstanceOf(Request::class))
            ->will($this->returnCallback(function (Request $request) {
                $this->assertSame('POST', $request->getMethod());
                $this->assertSame('https://api.twitter.com/1.1/statuses/endpoint', $request->getUri());
                $this->assertArrayHasKey('authorization', $request->getAllHeaders());

                return new Success();
            }))
        ;

        $body = new Body(...$this->parameters);

        (new Artax($this->clientMock))->post($this->url, $this->header, $body);
    }

    public function testPostStreamFlagSetsTimeout()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('request')
            // todo: test that the timeout value is negative, can't find a sane way to do this at the moment
            ->with($this->isInstanceOf(Request::class), $this->arrayHasKey(Client::OP_TRANSFER_TIMEOUT))
            ->will($this->returnValue(new Success))
        ;

        $body = new Body(...$this->parameters);

        (new Artax($this->clientMock))->post($this->url, $this->header, $body, AsyncTwitterHttpClient::OP_STREAM);
    }

    public function testGet()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('request')
            ->with($this->isInstanceOf(Request::class))
            ->will($this->returnCallback(function ($request) {
                $this->assertSame('GET', $request->getMethod());
                $this->assertSame(
                    'https://api.twitter.com/1.1/statuses/endpoint?param1=value1&param2=value2&param3=value3',
                    $request->getUri()
                );
                $this->assertArrayHasKey('authorization', $request->getAllHeaders());

                return new Success();
            }))
        ;

        (new Artax($this->clientMock))->get($this->url, $this->header, $this->parameters);
    }

    public function testGetStreamFlagSetsTimeout()
    {
        $this->clientMock
            ->expects($this->once())
            ->method('request')
            // todo: test that the timeout value is negative, can't find a sane way to do this at the moment
            ->with($this->isInstanceOf(Request::class), $this->arrayHasKey(Client::OP_TRANSFER_TIMEOUT))
            ->will($this->returnValue(new Success))
        ;

        (new Artax($this->clientMock))->get($this->url, $this->header, $this->parameters, AsyncTwitterHttpClient::OP_STREAM);
    }
}
