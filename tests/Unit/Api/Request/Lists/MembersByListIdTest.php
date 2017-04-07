<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberByListId;
use PHPUnit\Framework\TestCase;

class MembersByListIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new MemberByListId(12345);
    }

    public function testConstructorSetsListId()
    {
        $this->assertSame('list_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12345', $this->request->getParameters()[0]->getValue());
    }
}
