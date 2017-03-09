<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\Geo\InvalidGranularityException;
use PeeHaa\AsyncTwitter\Api\Request\Geo\Search;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Search();
    }

    public function testLatitude()
    {
        $this->request->latitude('37.7821120598956');

        $this->assertSame('lat', $this->request->getParameters()[0]->getKey());
        $this->assertSame('37.7821120598956', $this->request->getParameters()[0]->getValue());
    }

    public function testLongitude()
    {
        $this->request->longitude('-122.400612831116');

        $this->assertSame('long', $this->request->getParameters()[0]->getKey());
        $this->assertSame('-122.400612831116', $this->request->getParameters()[0]->getValue());
    }

    public function testQuery()
    {
        $this->request->query('Twitter HQ');

        $this->assertSame('query', $this->request->getParameters()[0]->getKey());
        $this->assertSame('Twitter HQ', $this->request->getParameters()[0]->getValue());
    }

    public function testIp()
    {
        $this->request->ip('74.125.19.104');

        $this->assertSame('ip', $this->request->getParameters()[0]->getKey());
        $this->assertSame('74.125.19.104', $this->request->getParameters()[0]->getValue());
    }

    public function testGranularityThrowsOnInvalidGranularity()
    {
        $this->expectException(InvalidGranularityException::class);

        $this->request->granularity('invalid');
    }

    public function testGranularity()
    {
        $this->request->granularity('poi');

        $this->assertSame('granularity', $this->request->getParameters()[0]->getKey());
        $this->assertSame('poi', $this->request->getParameters()[0]->getValue());
    }

    public function testAccuracy()
    {
        $this->request->accuracy('5ft');

        $this->assertSame('accuracy', $this->request->getParameters()[0]->getKey());
        $this->assertSame('5ft', $this->request->getParameters()[0]->getValue());
    }

    public function testAmount()
    {
        $this->request->amount(10);

        $this->assertSame('max_results', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
    }

    public function testContainedWithin()
    {
        $this->request->containedWithin('247f43d441defc03');

        $this->assertSame('contained_within', $this->request->getParameters()[0]->getKey());
        $this->assertSame('247f43d441defc03', $this->request->getParameters()[0]->getValue());
    }

    public function testStreetAddress()
    {
        $this->request->streetAddress('795 Folsom St');

        $this->assertSame('attribute:street_address', $this->request->getParameters()[0]->getKey());
        $this->assertSame('795 Folsom St', $this->request->getParameters()[0]->getValue());
    }

    public function testCallback()
    {
        $this->request->callback('foo()');

        $this->assertSame('callback', $this->request->getParameters()[0]->getKey());
        $this->assertSame('foo()', $this->request->getParameters()[0]->getValue());
    }
}
