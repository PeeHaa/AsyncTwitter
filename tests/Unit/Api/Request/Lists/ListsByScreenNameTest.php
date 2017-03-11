<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByScreenName;
use PHPUnit\Framework\TestCase;

class ListsByScreenNameTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ListByScreenName('noradio');
    }

    public function testConstructorSetsUserId()
    {
        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('noradio', $this->request->getParameters()[0]->getValue());
    }
}
