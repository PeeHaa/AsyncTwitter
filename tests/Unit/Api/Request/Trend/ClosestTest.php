<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\Trend\Closest;
use PHPUnit\Framework\TestCase;

class ClosestTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Closest('37.781157', '-122.400612831116');
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/trends/closest.json',
            $this->request->getEndpoint()->getUrl()
        );
    }

    public function testConstructorSetsLatitudeCorrectly()
    {
        $this->assertSame('lat', $this->request->getParameters()[0]->getKey());
        $this->assertSame('37.781157', $this->request->getParameters()[0]->getValue());
    }

    public function testConstructorSetsLongitudeCorrectly()
    {
        $this->assertSame('long', $this->request->getParameters()[1]->getKey());
        $this->assertSame('-122.400612831116', $this->request->getParameters()[1]->getValue());
    }
}
