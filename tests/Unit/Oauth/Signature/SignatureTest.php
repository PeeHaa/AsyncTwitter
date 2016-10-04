<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Oauth\Signature;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Oauth\Signature\BaseString;
use PeeHaa\AsyncTwitter\Oauth\Signature\Key;
use PeeHaa\AsyncTwitter\Oauth\Signature\Signature;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class SignatureTest extends TestCase
{
    public function testGetSignature()
    {
        $parameters = new Parameters(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret'),
            new Url('/statuses/endpoint'),
            ...[new Parameter('key1', 'value1')]
        );

        $key = new Key(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret')
        );

        $baseString = new BaseString('POST', new Url('/statuses/endpoint'), $parameters);

        $this->assertRegExp('~^.+%3D$~', (new Signature($baseString, $key))->getSignature());
    }
}
