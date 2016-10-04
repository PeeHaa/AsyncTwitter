<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Credentials;

use PHPUnit\Framework\TestCase;

class AccessTokenFactoryTest extends TestCase
{
    private $accessToken;

    public function setUp()
    {
        $this->accessToken = (new AccessTokenFactory())->create('TheToken', 'TheSecret');
    }

    public function testCreateReturnsAccessToken()
    {
        $this->assertInstanceOf(AccessToken::class, $this->accessToken);
    }

    public function testCreatePassesToken()
    {
        $this->assertSame('TheToken', $this->accessToken->getToken());
    }

    public function testCreatePassesSecret()
    {
        $this->assertSame('TheSecret', $this->accessToken->getSecret());
    }
}
