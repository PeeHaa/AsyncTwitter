<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\LookupByScreenNamesAndUserIds;
use PHPUnit\Framework\TestCase;

class LookupByScreenNamesAndUserIdsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new LookupByScreenNamesAndUserIds(['PHPeeHaa', 'EleventyJeeves'], [12345, 67890]);
    }

    public function testConstructorSetsScreenNamesCorrectly()
    {
        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa,EleventyJeeves', $this->request->getParameters()[0]->getValue());
    }

    public function testConstructorSetsUserIdsCorrectly()
    {
        $this->assertSame('user_id', $this->request->getParameters()[1]->getKey());
        $this->assertSame('12345,67890', $this->request->getParameters()[1]->getValue());
    }
}
