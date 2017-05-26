<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\ProfileBanner;
use PHPUnit\Framework\TestCase;

class ProfileBannerTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class() extends ProfileBanner {};
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/users/profile_banner.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
