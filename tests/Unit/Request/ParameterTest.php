<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Request;

use PeeHaa\AsyncTwitter\Request\Parameter;
use PHPUnit\Framework\TestCase;

class ParameterTest extends TestCase
{
    private $parameter;

    public function setUp()
    {
        $this->parameter = new Parameter('TheKey', 'TheValue');
    }

    public function testGetKey()
    {
        $this->assertSame('TheKey', $this->parameter->getKey());
    }

    public function testGetValue()
    {
        $this->assertSame('TheValue', $this->parameter->getValue());
    }
}
