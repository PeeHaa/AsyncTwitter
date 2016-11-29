<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Client\Exception;

use PHPUnit\Framework\TestCase;

class RequestFailedTest extends TestCase
{
    public function testHasExtraErrorInfoTrue()
    {
        $exception = new RequestFailed('TheMessage', 10, null, ['ExtraInfo']);

        $this->assertTrue($exception->hasExtraErrorInfo());
    }

    public function testHasExtraErrorInfoFalse()
    {
        $this->assertFalse((new RequestFailed('TheMessage'))->hasExtraErrorInfo());
    }

    public function testGetExtraErrorInfo()
    {
        $exception = new RequestFailed('TheMessage', 10, null, ['ExtraInfo']);

        $this->assertSame(['ExtraInfo'], $exception->getExtraErrorInfo());
    }
}
