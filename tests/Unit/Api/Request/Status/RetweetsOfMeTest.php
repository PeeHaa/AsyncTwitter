<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\RetweetsOfMe;
use PHPUnit\Framework\TestCase;

class RetweetsOfMeTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new RetweetsOfMe();
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

    public function testTrimUserReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->trimUser());
    }

    public function testTrimUserSetsCorrectly()
    {
        $this->request->trimUser();

        $this->assertSame('trim_user', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
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

    public function testExcludeUserEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeUserEntities());
    }

    public function testExcludeUserEntitiesSetsCorrectly()
    {
        $this->request->excludeUserEntities();

        $this->assertSame('include_user_entities', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }
}
