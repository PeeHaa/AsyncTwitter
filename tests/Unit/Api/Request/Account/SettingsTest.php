<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Account;

use PeeHaa\AsyncTwitter\Api\Request\Account\Settings;
use PHPUnit\Framework\TestCase;

class SettingsTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Settings();
    }

    public function testCreatesInstance()
    {
        $this->assertInstanceof(Settings::class, $this->request);
    }
}
