<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;
use PHPUnit\Framework\TestCase;

class BaseRequestTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class extends BaseRequest {
            public function __construct()
            {
                parent::__construct('GET', '/foo/bar');

                $this->parameters = [
                    'key1' => 'value1',
                    'key2' => 'value2',
                ];
            }
        };
    }

    public function testGetMethod()
    {
        $this->assertSame('GET', $this->request->getMethod());
    }

    public function testGetEndpoint()
    {
        $this->assertSame('https://api.twitter.com/1.1/foo/bar', $this->request->getEndpoint()->getBaseString());
    }

    public function testGetParameters()
    {
        $this->assertSame(2, count($this->request->getParameters()));

        $this->assertSame('key1', $this->request->getParameters()[0]->getKey());
        $this->assertSame('value1', $this->request->getParameters()[0]->getValue());

        $this->assertSame('key2', $this->request->getParameters()[1]->getKey());
        $this->assertSame('value2', $this->request->getParameters()[1]->getValue());
    }
}
