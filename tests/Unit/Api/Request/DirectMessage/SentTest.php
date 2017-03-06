<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\DirectMessage\Sent;
use PHPUnit\Framework\TestCase;

class SentTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Sent();
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

    public function testPageReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->page(10));
    }

    public function testPageSetsCorrectly()
    {
        $this->request->page(10);

        $this->assertSame('page', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
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
