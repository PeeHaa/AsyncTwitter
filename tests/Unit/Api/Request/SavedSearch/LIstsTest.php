<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\SavedSearch;

use PeeHaa\AsyncTwitter\Api\Request\SavedSearch\Lists;
use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Lists();
    }

    public function testConstructorSetsEndpointCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/saved_searches/list.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
