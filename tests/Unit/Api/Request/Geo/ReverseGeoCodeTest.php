<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\Geo\InvalidGranularityException;
use PeeHaa\AsyncTwitter\Api\Request\Geo\ReverseGeoCode;
use PHPUnit\Framework\TestCase;

class ReverseGeoCodeTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ReverseGeoCode('37.7821120598956', '-122.400612831116');
    }

    public function testConstructorSetsLatitudeCorrectly()
    {
        $this->assertSame('lat', $this->request->getParameters()[0]->getKey());
        $this->assertSame('37.7821120598956', $this->request->getParameters()[0]->getValue());
    }

    public function testConstructorSetsLongitudeCorrectly()
    {
        $this->assertSame('long', $this->request->getParameters()[1]->getKey());
        $this->assertSame('-122.400612831116', $this->request->getParameters()[1]->getValue());
    }

    public function testAccuracy()
    {
        $this->request->accuracy('5ft');

        $this->assertSame('accuracy', $this->request->getParameters()[2]->getKey());
        $this->assertSame('5ft', $this->request->getParameters()[2]->getValue());
    }

    public function testGranularityThrowsOnInvalidGranularity()
    {
        $this->expectException(InvalidGranularityException::class);

        $this->request->granularity('invalid');
    }

    public function testGranularity()
    {
        $this->request->granularity('poi');

        $this->assertSame('granularity', $this->request->getParameters()[2]->getKey());
        $this->assertSame('poi', $this->request->getParameters()[2]->getValue());
    }

    public function testAmount()
    {
        $this->request->amount(10);

        $this->assertSame('max_results', $this->request->getParameters()[2]->getKey());
        $this->assertSame('10', $this->request->getParameters()[2]->getValue());
    }

    public function testCallback()
    {
        $this->request->callback('foo()');

        $this->assertSame('callback', $this->request->getParameters()[2]->getKey());
        $this->assertSame('foo()', $this->request->getParameters()[2]->getValue());
    }
}
