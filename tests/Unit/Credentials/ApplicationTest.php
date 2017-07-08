<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Credentials;

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    /** @var Application */
    private $application;

    public function setUp()
    {
        $this->application = new Application('TheKey', 'TheSecret');
    }

    public function testGetKey()
    {
        $this->assertSame('TheKey', $this->application->getKey());
    }

    public function testGetSecret()
    {
        $this->assertSame('TheSecret', $this->application->getSecret());
    }
}
