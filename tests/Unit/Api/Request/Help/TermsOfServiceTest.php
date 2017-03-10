<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Language;

use PeeHaa\AsyncTwitter\Api\Request\Help\TermsOfService;
use PHPUnit\Framework\TestCase;

class TermsOfServiceTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new TermsOfService();
    }

    public function testConstructor()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/help/tos.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
