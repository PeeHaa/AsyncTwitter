<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Friendship\Lookup;
use PHPUnit\Framework\TestCase;

class LookupTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Lookup();
    }

    public function testUserIdsReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->userIds([13]));
    }

    public function testUserIdsSetsCorrectly()
    {
        $this->request->userIds([13]);

        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testUserIdsSetsCorrectlyMultiple()
    {
        $this->request->userIds([13, 14]);

        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13,14', $this->request->getParameters()[0]->getValue());
    }

    public function testScreenNamesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->screenNames(['PHPeeHaa']));
    }

    public function testScreenNamesSetsCorrectly()
    {
        $this->request->screenNames(['PHPeeHaa']);

        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }

    public function testScreenNamesSetsCorrectlyMultiple()
    {
        $this->request->screenNames(['PHPeeHaa', '_DaveRandom']);

        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa,_DaveRandom', $this->request->getParameters()[0]->getValue());
    }
}
