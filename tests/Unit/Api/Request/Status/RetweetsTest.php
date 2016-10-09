<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Retweets;
use PHPUnit\Framework\TestCase;

class RetweetsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Retweets(123);
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
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
