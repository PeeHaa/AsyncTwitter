<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Client;

use Amp\Artax\Response;
use Amp\Promise;
use Amp\Success;
use PeeHaa\AsyncTwitter\Api\Client\Exception\BadGateway;
use PeeHaa\AsyncTwitter\Api\Client\Exception\BadRequest;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Forbidden;
use PeeHaa\AsyncTwitter\Api\Client\Exception\GatewayTimeout;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Gone;
use PeeHaa\AsyncTwitter\Api\Client\Exception\InvalidMethod;
use PeeHaa\AsyncTwitter\Api\Client\Exception\NotAcceptable;
use PeeHaa\AsyncTwitter\Api\Client\Exception\NotFound;
use PeeHaa\AsyncTwitter\Api\Client\Exception\RateLimitTriggered;
use PeeHaa\AsyncTwitter\Api\Client\Exception\RequestFailed;
use PeeHaa\AsyncTwitter\Api\Client\Exception\ServerError;
use PeeHaa\AsyncTwitter\Api\Client\Exception\ServiceUnavailable;
use PeeHaa\AsyncTwitter\Api\Client\Exception\Unauthorized;
use PeeHaa\AsyncTwitter\Api\Client\Exception\UnprocessableEntity;
use PeeHaa\AsyncTwitter\Api\Request\Request;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Client as HttpClient;
use PeeHaa\AsyncTwitter\Request\FieldParameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;
use function ExceptionalJSON\decode as json_try_decode;

class ClientTest extends TestCase
{
    private $responseMock;

    private $httpClientMock;

    private $requestMock;

    public function setUp()
    {
        $this->responseMock   = null;
        $this->httpClientMock = null;
        $this->requestMock    = null;
    }

    private function setUpMocks()
    {
        $this->responseMock = $this->createMock(Response::class);

        $this->responseMock
            ->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue('{"errors":[{"message":"TheMessage","code":34}]}'))
        ;

        $this->httpClientMock = $this->createMock(HttpClient::class);

        $this->httpClientMock
            ->expects($this->once())
            ->method('post')
            ->will($this->returnValue(new Success($this->responseMock)))
        ;

        $this->requestMock = $this->createMock(Request::class);

        $this->requestMock
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'))
        ;

        $this->requestMock
            ->expects($this->exactly(2))
            ->method('getEndpoint')
            ->will($this->returnValue(new Url('https://api.twitter.com/1.1', '/statuses/endpoint')))
        ;

        $this->requestMock
            ->expects($this->exactly(2))
            ->method('getParameters')
            ->will($this->returnValue([new FieldParameter('key1', 'value1')]))
        ;
    }

    public function testRequestThrowsUpOnInvalidMethod()
    {
        $client = new Client(
            $this->createMock(HttpClient::class),
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $request = $this->createMock(Request::class);

        $request
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('INVALID'))
        ;

        $this->expectException(InvalidMethod::class);

        $client->request($request);
    }

    public function testRequestThrowsUpOnBadRequest()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(400))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(BadRequest::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnUnAuthorized()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(401))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(Unauthorized::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnForbidden()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(403))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(Forbidden::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnNotFound()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(404))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(NotFound::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnNotAcceptable()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(406))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(NotAcceptable::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnGone()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(410))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(Gone::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnRateLimitTriggered()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(420))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(RateLimitTriggered::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnUnprocessableEntity()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(422))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(UnprocessableEntity::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnRateLimitTriggered2()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(429))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(RateLimitTriggered::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnServerError()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(500))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(ServerError::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnNotBadGateway()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(502))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(BadGateway::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnServiceUnavailable()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(503))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(ServiceUnavailable::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestThrowsUpOnGatewayTimeout()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(3))
            ->method('getStatus')
            ->will($this->returnValue(504))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $this->expectException(GatewayTimeout::class);

        \Amp\wait($client->request($this->requestMock));
    }

    public function testRequestContinuesOnUnknownHttpStatusCode()
    {
        $this->setUpMocks();

        $this->responseMock
            ->expects($this->exactly(2))
            ->method('getStatus')
            ->will($this->returnValue(999))
        ;

        $client = new Client(
            $this->httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        \Amp\wait($promise = $client->request($this->requestMock));

        $this->assertInstanceOf(Promise::class, $promise);
    }

    public function testRequestThrowsUpOnInvalidJsonResponse()
    {
        $responseMock = $this->createMock(Response::class);

        $responseMock
            ->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue('{"'))
        ;

        $httpClientMock = $this->createMock(HttpClient::class);

        $httpClientMock
            ->expects($this->once())
            ->method('post')
            ->will($this->returnValue(new Success($responseMock)))
        ;

        $client = new Client(
            $httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $requestMock = $this->createMock(Request::class);

        $requestMock
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getEndpoint')
            ->will($this->returnValue(new Url('https://api.twitter.com/1.1', '/statuses/endpoint')))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getParameters')
            ->will($this->returnValue([new FieldParameter('key1', 'value1')]))
        ;

        $this->expectException(RequestFailed::class);

        \Amp\wait($client->request($requestMock));
    }

    public function testRequestPostValid()
    {
        $responseMock = $this->createMock(Response::class);

        $responseMock
            ->expects($this->exactly(2))
            ->method('getBody')
            ->will($this->returnValue('{"data":[{"message":"TheMessage","code":34}]}'))
        ;

        $responseMock
            ->expects($this->exactly(2))
            ->method('getStatus')
            ->will($this->returnValue(200))
        ;

        $httpClientMock = $this->createMock(HttpClient::class);

        $httpClientMock
            ->expects($this->once())
            ->method('post')
            ->will($this->returnValue(new Success($responseMock)))
        ;

        $client = new Client(
            $httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $requestMock = $this->createMock(Request::class);

        $requestMock
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getEndpoint')
            ->will($this->returnValue(new Url('https://api.twitter.com/1.1', '/statuses/endpoint')))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getParameters')
            ->will($this->returnValue([new FieldParameter('key1', 'value1')]))
        ;

        \Amp\wait($promise = $client->request($requestMock));

        $this->assertInstanceOf(Promise::class, $promise);
    }

    public function testRequestGetValid()
    {
        $responseMock = $this->createMock(Response::class);

        $responseMock
            ->expects($this->exactly(2))
            ->method('getBody')
            ->will($this->returnValue('{"data":[{"message":"TheMessage","code":34}]}'))
        ;

        $responseMock
            ->expects($this->exactly(2))
            ->method('getStatus')
            ->will($this->returnValue(200))
        ;

        $httpClientMock = $this->createMock(HttpClient::class);

        $httpClientMock
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue(new Success($responseMock)))
        ;

        $client = new Client(
            $httpClientMock,
            $this->createMock(Application::class),
            $this->createMock(AccessToken::class)
        );

        $requestMock = $this->createMock(Request::class);

        $requestMock
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('GET'))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getEndpoint')
            ->will($this->returnValue(new Url('https://api.twitter.com/1.1', '/statuses/endpoint')))
        ;

        $requestMock
            ->expects($this->exactly(2))
            ->method('getParameters')
            ->will($this->returnValue([new FieldParameter('key1', 'value1')]))
        ;

        \Amp\wait($promise = $client->request($requestMock));

        $this->assertInstanceOf(Promise::class, $promise);
    }
}
