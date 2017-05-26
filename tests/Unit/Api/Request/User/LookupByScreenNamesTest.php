<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\LookupByScreenNames;
use PHPUnit\Framework\TestCase;

class LookupByScreenNamesTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new LookupByScreenNames(['PHPeeHaa', 'EleventyJeeves']);
    }

    public function testConstructorSetsScreenNamesCorrectly()
    {
        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa,EleventyJeeves', $this->request->getParameters()[0]->getValue());
    }
}
