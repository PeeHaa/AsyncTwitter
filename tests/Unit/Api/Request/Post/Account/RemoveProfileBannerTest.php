<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Post\Account;

use PeeHaa\AsyncTwitter\Api\Request\Post\Account\RemoveProfileBanner;
use PHPUnit\Framework\TestCase;

class RemoveProfileBannerTest extends TestCase
{
    /** @var RemoveProfileBanner */
    private $request;

    public function setUp()
    {
        $this->request = new RemoveProfileBanner();
    }

    public function testCreatesInstance()
    {
        $this->assertInstanceof(RemoveProfileBanner::class, $this->request);
    }
}
