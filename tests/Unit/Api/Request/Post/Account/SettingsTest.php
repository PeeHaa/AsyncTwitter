<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Post\Account;

use PeeHaa\AsyncTwitter\Api\Request\Post\Account\Settings;
use PHPUnit\Framework\TestCase;

class SettingsTest extends TestCase
{
    /** @var Settings */
    private $request;

    public function setUp()
    {
        $this->request = new Settings();
    }

    public function testEnableSleepTimeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->enableSleepTime());
    }

    public function testEnableSleepTimeSetsCorrectly()
    {
        $this->request->enableSleepTime();

        $this->assertSame('sleep_time_enabled', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }

    public function testDisableSleepTimeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->disableSleepTime());
    }

    public function testDisableSleepTimeSetsCorrectly()
    {
        $this->request->disableSleepTime();

        $this->assertSame('sleep_time_enabled', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }

    public function testSleepTimeStartReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->sleepTimeStart(5));
    }

    public function testSleepTimeStartSetsCorrectly()
    {
        $this->request->sleepTimeStart(5);

        $this->assertSame('start_sleep_time', $this->request->getParameters()[0]->getKey());
        $this->assertSame('05', $this->request->getParameters()[0]->getValue());
    }

    public function testSleepTimeEndReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->sleepTimeEnd(9));
    }

    public function testSleepTimeEndSetsCorrectly()
    {
        $this->request->sleepTimeEnd(9);

        $this->assertSame('end_sleep_time', $this->request->getParameters()[0]->getKey());
        $this->assertSame('09', $this->request->getParameters()[0]->getValue());
    }

    public function testTimeZoneReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->timeZone('Europe/Amsterdam'));
    }

    public function testTimeZoneSetsCorrectly()
    {
        $this->request->timeZone('Europe/Amsterdam');

        $this->assertSame('time_zone', $this->request->getParameters()[0]->getKey());
        $this->assertSame('Europe/Amsterdam', $this->request->getParameters()[0]->getValue());
    }

    public function testTrendLocationWoeIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->trendLocationWoeId(1));
    }

    public function testTrendLocationWoeIdSetsCorrectly()
    {
        $this->request->trendLocationWoeId(1);

        $this->assertSame('trend_location_woeid', $this->request->getParameters()[0]->getKey());
        $this->assertSame('1', $this->request->getParameters()[0]->getValue());
    }

    public function testLanguageReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->language('nl'));
    }

    public function testLanguageSetsCorrectly()
    {
        $this->request->language('nl');

        $this->assertSame('lang', $this->request->getParameters()[0]->getKey());
        $this->assertSame('nl', $this->request->getParameters()[0]->getValue());
    }
}
