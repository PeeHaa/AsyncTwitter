<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\ShowByUserId;
use PHPUnit\Framework\TestCase;

class ShowByUserIdTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ShowByUserId(12345);
    }

    public function testConstructorSetsUserIdsCorrectly()
    {
        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('12345', $this->request->getParameters()[0]->getValue());
    }
}
