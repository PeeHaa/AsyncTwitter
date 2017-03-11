<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Lists;

use PeeHaa\AsyncTwitter\Api\Request\Lists\ListByAuthenticatedUser;
use PeeHaa\AsyncTwitter\Api\Request\Lists\Lists;
use PHPUnit\Framework\TestCase;

class ListByAuthenticatedUserTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new ListByAuthenticatedUser();
    }

    public function testExtendsLists()
    {
        $this->assertInstanceOf(Lists::class, $this->request);
    }
}
