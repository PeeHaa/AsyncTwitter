<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Collection;

use PeeHaa\AsyncTwitter\Api\Request\Collection\Show;
use PHPUnit\Framework\TestCase;

class ShowTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Show('custom-388061495298244609');
    }

    public function testIdSetsCorrectly()
    {
        $this->assertSame('id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('custom-388061495298244609', $this->request->getParameters()[0]->getValue());
    }
}
