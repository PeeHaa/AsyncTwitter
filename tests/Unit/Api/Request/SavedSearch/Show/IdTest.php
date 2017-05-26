<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\SavedSearch\Show;

use PeeHaa\AsyncTwitter\Api\Request\SavedSearch\Show\Id;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Id(12);
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/saved_searches/show/12.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
