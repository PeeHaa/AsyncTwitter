<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\Collection\Entries;
use PHPUnit\Framework\TestCase;

class EntriesTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Entries('custom-539487832448843776');
    }

    public function testIdSetsCorrectly()
    {
        $this->assertSame('id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('custom-539487832448843776', $this->request->getParameters()[0]->getValue());
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[1]->getKey());
        $this->assertSame('10', $this->request->getParameters()[1]->getValue());
    }

    public function testMinimumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->minimumId(13));
    }

    public function testMinimumIdSetsCorrectly()
    {
        $this->request->minimumId(13);

        $this->assertSame('min_position', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13', $this->request->getParameters()[1]->getValue());
    }

    public function testMaximumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->maximumId(13));
    }

    public function testMaximumIdSetsCorrectly()
    {
        $this->request->maximumId(13);

        $this->assertSame('max_position', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13', $this->request->getParameters()[1]->getValue());
    }
}
