<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\Application\RateLimitStatus;
use PHPUnit\Framework\TestCase;

class RateLimitStatusTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new RateLimitStatus();
    }

    public function testFilterResourcesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->filterResources([]));
    }

    public function testFilterResourcesSetsCorrectly()
    {
        $this->request->filterResources([
            'statuses',
            'friends',
            'trends',
            'help',
        ]);

        $this->assertSame('resources', $this->request->getParameters()[0]->getKey());
        $this->assertSame('statuses,friends,trends,help', $this->request->getParameters()[0]->getValue());
    }
}
