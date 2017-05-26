<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Mute\User;

use PeeHaa\AsyncTwitter\Api\Request\Mute\User\Lists;
use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Lists();
    }

    public function testCursorReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->cursor(2));
    }

    public function testCursorSetsCorrectly()
    {
        $this->request->cursor(2);

        $this->assertSame('cursor', $this->request->getParameters()[0]->getKey());
        $this->assertSame('2', $this->request->getParameters()[0]->getValue());
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
