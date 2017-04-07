<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberBySlugAndOwnerId;
use PHPUnit\Framework\TestCase;

class MembersBySlugAndOwnerIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new MemberBySlugAndOwnerId('the-slug', 123456);
    }

    public function testConstructorSetsSlug()
    {
        $this->assertSame('slug', $this->request->getParameters()[0]->getKey());
        $this->assertSame('the-slug', $this->request->getParameters()[0]->getValue());
    }

    public function testConstructorSetsOwnerId()
    {
        $this->assertSame('owner_id', $this->request->getParameters()[1]->getKey());
        $this->assertSame('123456', $this->request->getParameters()[1]->getValue());
    }
}
