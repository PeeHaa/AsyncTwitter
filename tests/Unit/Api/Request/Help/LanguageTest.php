<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Language;

use PeeHaa\AsyncTwitter\Api\Request\Help\Language;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Language();
    }

    public function testConstructor()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/help/languages.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
