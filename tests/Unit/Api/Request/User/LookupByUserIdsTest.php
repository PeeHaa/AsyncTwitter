<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\LookupByUserIds;
use PHPUnit\Framework\TestCase;

class LookupByUserIdsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new LookupByUserIds([12345, 67890]);
    }

    public function testConstructorSetsUserIdsCorrectly()
    {
        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12345,67890', $this->request->getParameters()[0]->getValue());
    }
}
