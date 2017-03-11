<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\Lists;
use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class() extends Lists {};
    }

    public function testReverse()
    {
        $this->request->reverse();

        $this->assertSame('reverse', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }
}
