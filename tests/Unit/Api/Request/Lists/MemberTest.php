<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class() extends Member {};
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

    public function testFromCursorReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->fromCursor(1200));
    }

    public function testFromCursorSetsCorrectly()
    {
        $this->request->fromCursor(1200);

        $this->assertSame('cursor', $this->request->getParameters()[0]->getKey());
        $this->assertSame('1200', $this->request->getParameters()[0]->getValue());
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

    public function testSkipStatusReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->skipStatus());
    }

    public function testSkipStatusSetsCorrectly()
    {
        $this->request->skipStatus();

        $this->assertSame('skip_status', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }
}
