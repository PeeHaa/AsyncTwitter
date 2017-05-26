<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\Trend\Place;
use PHPUnit\Framework\TestCase;

class PlaceTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Place(12);
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/trends/place.json',
            $this->request->getEndpoint()->getUrl()
        );
    }

    public function testConstructorSetsIdCorrectly()
    {
        $this->assertSame('id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12', $this->request->getParameters()[0]->getValue());
    }

    public function testExcludeHashTags()
    {
        $this->request->excludeHashTags();

        $this->assertSame('exclude', $this->request->getParameters()[1]->getKey());
        $this->assertSame('hashtags', $this->request->getParameters()[1]->getValue());
    }
}
