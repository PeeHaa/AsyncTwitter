<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\Collection\Lists;
use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class() extends Lists {

        };
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

    public function testTweetIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->tweetId(10));
    }

    public function testTweetIdSetsCorrectly()
    {
        $this->request->tweetId(10);

        $this->assertSame('tweet_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
    }

    public function testFromCursorReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->fromCursor('BXb2synCEAE'));
    }

    public function testFromCursorSetsCorrectly()
    {
        $this->request->fromCursor('BXb2synCEAE');

        $this->assertSame('cursor', $this->request->getParameters()[0]->getKey());
        $this->assertSame('BXb2synCEAE', $this->request->getParameters()[0]->getValue());
    }
}
