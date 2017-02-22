<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Oauth\Signature;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Oauth\Signature\BaseString;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class BaseStringTest extends TestCase
{
    private $baseString;

    public function setUp()
    {
        $parameters = new Parameters(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret'),
            new Url('https://api.twitter.com/1.1', '/statuses/endpoint'),
            ...[new Parameter('key1', 'value1')]
        );

        $this->baseString = new BaseString('POST', new Url('https://api.twitter.com/1.1', '/statuses/endpoint'), $parameters);
    }

    public function testGetString()
    {
        $pattern = '^POST&https%3A%2F%2Fapi.twitter.com%2F1.1%2Fstatuses%2Fendpoint&key1%3Dvalue1';
        $pattern.= '%26oauth_consumer_key%3DApplicationKey%26oauth_nonce%3D[^%]+';
        $pattern.= '%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D[^%]+%26oauth_token%3DAccessToken';
        $pattern.= '%26oauth_version%3D1.0$';

        $this->assertRegExp('~' . $pattern . '~', $this->baseString->getString());
    }
}
