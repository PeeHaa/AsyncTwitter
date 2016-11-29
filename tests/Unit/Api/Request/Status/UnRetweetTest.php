<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\UnRetweet;
use PHPUnit\Framework\TestCase;

class UnRetweetTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new UnRetweet(123);
    }

    public function testTrimUserReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->trimUser());
    }

    public function testTrimUserSetsCorrectly()
    {
        $this->request->trimUser();

        $this->assertSame('trim_user', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }
}
