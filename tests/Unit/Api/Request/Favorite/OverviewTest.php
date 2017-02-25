<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\Favorite\Overview;
use PHPUnit\Framework\TestCase;

class OverviewTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Overview();
    }

    public function testUserIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->userId(13));
    }

    public function testUserIdSetsCorrectly()
    {
        $this->request->userId(13);

        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testScreenNameReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->screenName('PHPeeHaa'));
    }

    public function testScreenNameSetsCorrectly()
    {
        $this->request->screenName('PHPeeHaa');

        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
    }

    public function testMinimumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->minimumId(13));
    }

    public function testMinimumIdSetsCorrectly()
    {
        $this->request->minimumId(13);

        $this->assertSame('since_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testMaximumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->maximumId(13));
    }

    public function testMaximumIdSetsCorrectly()
    {
        $this->request->maximumId(13);

        $this->assertSame('max_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testExcludeEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeEntities());
    }

    public function testExcludeEntitiesSetsCorrectly()
    {
        $this->request->excludeEntities();

        $this->assertSame('include_entities', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }
}
