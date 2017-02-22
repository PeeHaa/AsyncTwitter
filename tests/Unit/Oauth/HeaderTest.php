<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Oauth;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Oauth\Header;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Oauth\Signature\BaseString;
use PeeHaa\AsyncTwitter\Oauth\Signature\Key;
use PeeHaa\AsyncTwitter\Oauth\Signature\Signature;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class HeaderTest extends TestCase
{
    public function testGetHeader()
    {
        $pattern = '^OAuth oauth_consumer_key="ApplicationKey", oauth_nonce="[^"]+", ';
        $pattern.= 'oauth_signature="[^"]+", oauth_signature_method="HMAC-SHA1", oauth_timestamp="[^"]+", ';
        $pattern.= 'oauth_token="[^"]+", oauth_version="1.0"$';

        $parameters = new Parameters(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret'),
            new Url('https://api.twitter.com/1.1', '/statuses/endpoint'),
            ...[new Parameter('key1', 'value1')]
        );

        $signature = new Signature(
            new BaseString('POST', new Url('https://api.twitter.com/1.1', '/statuses/endpoint'), $parameters),
            new Key(new Application('ApplicationKey', 'ApplicationSecret'), new AccessToken('AccessToken', 'AccessSecret'))
        );

        $header = new Header($parameters, $signature);

        $this->assertRegExp('~' . $pattern . '~', $header->getHeader());
    }
}
