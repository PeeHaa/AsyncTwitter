<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Unit\Credentials;

use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PHPUnit\Framework\TestCase;

class AccessTokenTest extends TestCase
{
    private $accessToken;

    public function setUp()
    {
        $this->accessToken = new AccessToken('TheToken', 'TheSecret');
    }

    public function testGetToken()
    {
        $this->assertSame('TheToken', $this->accessToken->getToken());
    }

    public function testGetSecret()
    {
        $this->assertSame('TheSecret', $this->accessToken->getSecret());
    }
}
