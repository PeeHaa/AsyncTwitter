<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\Collection\ListByScreenName;
use PHPUnit\Framework\TestCase;

class ListByScreenNameTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ListByScreenName('twitterdev');
    }

    public function testIdSetsCorrectly()
    {
        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('twitterdev', $this->request->getParameters()[0]->getValue());
    }
}
