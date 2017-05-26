<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Trend;

use PeeHaa\AsyncTwitter\Api\Request\Trend\Available;
use PHPUnit\Framework\TestCase;

class AvailableTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Available();
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/trends/available.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
