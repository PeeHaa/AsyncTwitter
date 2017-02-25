<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\Collection\ListByUserId;
use PHPUnit\Framework\TestCase;

class ListByUserIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ListByUserId(20);
    }

    public function testIdSetsCorrectly()
    {
        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('20', $this->request->getParameters()[0]->getValue());
    }
}
