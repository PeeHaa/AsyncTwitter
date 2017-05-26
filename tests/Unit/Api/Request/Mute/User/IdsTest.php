<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Mute\User;

use PeeHaa\AsyncTwitter\Api\Request\Mute\User\Ids;
use PHPUnit\Framework\TestCase;

class IdsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Ids();
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
}
