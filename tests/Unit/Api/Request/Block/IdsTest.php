<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\Block\Ids;
use PHPUnit\Framework\TestCase;

class IdsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Ids();
    }

    public function testStringifyIdsReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->stringifyIds());
    }

    public function testStringifyIdsSetsCorrectly()
    {
        $this->request->stringifyIds();

        $this->assertSame('stringify_ids', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
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
}
