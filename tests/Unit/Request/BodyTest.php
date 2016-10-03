<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Request;

use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PHPUnit\Framework\TestCase;

class BodyTest extends TestCase
{
    public function testGetParametersReturnsAll()
    {
        $parameters = [
            new Parameter('param1', 'value1'),
            new Parameter('param2', 'value2'),
            new Parameter('param3', 'value3'),
        ];

        $body = new Body(...$parameters);

        $this->assertSame(3, count($body->getParameters()));
    }

    public function testGetParametersReturnsInOrder()
    {
        $parameters = [
            new Parameter('param1', 'value1'),
            new Parameter('param2', 'value2'),
            new Parameter('param3', 'value3'),
        ];

        $body = new Body(...$parameters);

        $this->assertSame('param1', $body->getParameters()[0]->getKey());
        $this->assertSame('param2', $body->getParameters()[1]->getKey());
        $this->assertSame('param3', $body->getParameters()[2]->getKey());
    }
}
