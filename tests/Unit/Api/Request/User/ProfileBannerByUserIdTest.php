<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\ProfileBannerByUserId;
use PHPUnit\Framework\TestCase;

class ProfileBannerByUserIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ProfileBannerByUserId(12345);
    }

    public function testConstructorSetsUserIdsCorrectly()
    {
        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12345', $this->request->getParameters()[0]->getValue());
    }
}
