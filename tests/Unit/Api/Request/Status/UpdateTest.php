<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\Update;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Update('TheMessage');
    }

    public function testReplyToReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->replyTo(13));
    }

    public function testReplyToSetsCorrectly()
    {
        $this->request->replyTo(13);

        $this->assertSame('in_reply_to_status_id', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13', $this->request->getParameters()[1]->getValue());
    }

    public function testIsSensitiveReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->isSensitive());
    }

    public function testIsSensitiveSetsCorrectly()
    {
        $this->request->isSensitive();

        $this->assertSame('possibly_sensitive', $this->request->getParameters()[1]->getKey());
        $this->assertSame('true', $this->request->getParameters()[1]->getValue());
    }

    public function testSetLatitudeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->setLatitude(13.2));
    }

    public function testSetLatitudeSetsCorrectly()
    {
        $this->request->setLatitude(13.2);

        $this->assertSame('lat', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13.2', $this->request->getParameters()[1]->getValue());
    }

    public function testSetLongitudeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->setLongitude(13.2));
    }

    public function testSetLongitudeSetsCorrectly()
    {
        $this->request->setLongitude(13.2);

        $this->assertSame('long', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13.2', $this->request->getParameters()[1]->getValue());
    }

    public function testDisplayCoordinatesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->displayCoordinates());
    }

    public function testDisplayCoordinatesSetsCorrectly()
    {
        $this->request->displayCoordinates();

        $this->assertSame('display_coordinates', $this->request->getParameters()[1]->getKey());
        $this->assertSame('true', $this->request->getParameters()[1]->getValue());
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
}
