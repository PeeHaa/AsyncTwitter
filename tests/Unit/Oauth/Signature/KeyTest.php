<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Oauth\Signature;

use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Oauth\Signature\Key;
use PHPUnit\Framework\TestCase;

class KeyTest extends TestCase
{
    public function testGetKey()
    {
        $key = new Key(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret')
        );

        $this->assertSame('ApplicationSecret&AccessSecret', $key->getKey());
    }
}
