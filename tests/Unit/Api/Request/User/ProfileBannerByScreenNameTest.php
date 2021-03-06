<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\ProfileBannerByScreenName;
use PHPUnit\Framework\TestCase;

class ProfileBannerByScreenNameTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ProfileBannerByScreenName('PHPeeHaa');
    }

    public function testConstructorSetsScreenNamesCorrectly()
    {
        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }
}
