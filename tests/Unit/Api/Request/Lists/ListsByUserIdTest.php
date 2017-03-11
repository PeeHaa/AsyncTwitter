<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByUserId;
use PHPUnit\Framework\TestCase;

class ListsByUserIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ListByUserId(12345);
    }

    public function testConstructorSetsUserId()
    {
        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12345', $this->request->getParameters()[0]->getValue());
    }
}
