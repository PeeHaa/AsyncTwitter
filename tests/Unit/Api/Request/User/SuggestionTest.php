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

    public function testLangReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->lang('nl'));
    }

    public function testLangSetsCorrectly()
    {
        $this->request->lang('nl');

        $this->assertSame('lang', $this->request->getParameters()[0]->getKey());
        $this->assertSame('nl', $this->request->getParameters()[0]->getValue());
    }
}
