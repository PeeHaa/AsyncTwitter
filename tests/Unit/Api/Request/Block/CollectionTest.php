<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\Block\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTestTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Collection();
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
