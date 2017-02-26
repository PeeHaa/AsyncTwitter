<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\Geo\Id;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Id('df51dec6f4ee2b2c');
    }

    public function testConstructorSetsIdCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/geo/id/df51dec6f4ee2b2c.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
