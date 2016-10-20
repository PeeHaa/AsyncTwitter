<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Show;
use PHPUnit\Framework\TestCase;

class ShowTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Show(123);
    }

    public function testTrimUserReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->trimUser());
    }

    public function testTrimUserSetsCorrectly()
    {
        $this->request->trimUser();

        $this->assertSame('trim_user', $this->request->getParameters()[1]->getKey());
        $this->assertSame('true', $this->request->getParameters()[1]->getValue());
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

    public function testIncludeUserRetweetStatusReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->includeUserRetweetStatus());
    }

    public function testIncludeUserRetweetStatusSetsCorrectly()
    {
        $this->request->includeUserRetweetStatus();

        $this->assertSame('include_my_retweet', $this->request->getParameters()[1]->getKey());
        $this->assertSame('true', $this->request->getParameters()[1]->getValue());
    }
}
