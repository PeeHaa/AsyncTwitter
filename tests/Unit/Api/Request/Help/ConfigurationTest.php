<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Language;

use PeeHaa\AsyncTwitter\Api\Request\Help\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Configuration();
    }

    public function testConstructor()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/help/configuration.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
