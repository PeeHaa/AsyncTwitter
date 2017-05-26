<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\Search;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Search('peehaa');
    }

    public function testConstructorSetsKeywordsCorrectly()
    {
        $this->assertSame('q', $this->request->getParameters()[0]->getKey());
        $this->assertSame('peehaa', $this->request->getParameters()[0]->getValue());
    }

    public function testPageReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->page(10));
    }

    public function testPageSetsCorrectly()
    {
        $this->request->page(10);

        $this->assertSame('page', $this->request->getParameters()[1]->getKey());
        $this->assertSame('10', $this->request->getParameters()[1]->getValue());
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[1]->getKey());
        $this->assertSame('10', $this->request->getParameters()[1]->getValue());
    }

    public function testExcludeEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeEntities());
    }

    public function testExcludeEntitiesSetsCorrectly()
    {
        $this->request->excludeEntities();

        $this->assertSame('include_entities', $this->request->getParameters()[1]->getKey());
        $this->assertSame('false', $this->request->getParameters()[1]->getValue());
    }
}
