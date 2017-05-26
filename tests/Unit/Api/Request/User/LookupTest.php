<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\Lookup;
use PHPUnit\Framework\TestCase;

class LookupTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new class() extends Lookup {};
    }

    public function testExcludeEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeEntities());
    }

    public function testExcludeEntitiesSetsCorrectly()
    {
        $this->request->excludeEntities();

        $this->assertSame('include_entities', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }
}
