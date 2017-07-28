<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User;

use PeeHaa\AsyncTwitter\Api\Request\User\Suggestion;
use PHPUnit\Framework\TestCase;

class SuggestionTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Suggestion();
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
