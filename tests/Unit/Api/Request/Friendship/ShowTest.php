<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Friendship;

use PeeHaa\AsyncTwitter\Api\Request\Friendship\Show;
use PHPUnit\Framework\TestCase;

class ShowTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Show();
    }

    public function testSourceUserIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->sourceUserId(13));
    }

    public function testSourceUserIdSetsCorrectly()
    {
        $this->request->sourceUserId(13);

        $this->assertSame('source_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testSourceScreenNameReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->sourceScreenName('PHPeeHaa'));
    }

    public function testSourceScreenNameSetsCorrectly()
    {
        $this->request->sourceScreenName('PHPeeHaa');

        $this->assertSame('source_screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }

    public function testTargetUserIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->targetUserId(13));
    }

    public function testTargetUserIdSetsCorrectly()
    {
        $this->request->targetUserId(13);

        $this->assertSame('target_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testTargetScreenNameReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->targetScreenName('PHPeeHaa'));
    }

    public function testTargetScreenNameSetsCorrectly()
    {
        $this->request->targetScreenName('PHPeeHaa');

        $this->assertSame('target_screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }
}
