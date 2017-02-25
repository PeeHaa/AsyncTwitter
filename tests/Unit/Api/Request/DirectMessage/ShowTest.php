<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\DirectMessage\Show;
use PHPUnit\Framework\TestCase;

class ShowTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Show(587424932);
    }

    public function testIdSetsCorrectly()
    {
        $this->assertSame('id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('587424932', $this->request->getParameters()[0]->getValue());
    }
}
