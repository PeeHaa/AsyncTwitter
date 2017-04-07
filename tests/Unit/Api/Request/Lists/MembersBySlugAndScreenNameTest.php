<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\MemberBySlugAndScreenName;
use PHPUnit\Framework\TestCase;

class MembersBySlugAndScreenNameTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new MemberBySlugAndScreenName('the-slug', 'PeeHaa');
    }

    public function testConstructorSetsSlug()
    {
        $this->assertSame('slug', $this->request->getParameters()[0]->getKey());
        $this->assertSame('the-slug', $this->request->getParameters()[0]->getValue());
    }

    public function testConstructorSetsScreenName()
    {
        $this->assertSame('owner_screen_name', $this->request->getParameters()[1]->getKey());
        $this->assertSame('PeeHaa', $this->request->getParameters()[1]->getValue());
    }
}
