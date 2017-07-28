<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User\Suggestion;

use PeeHaa\AsyncTwitter\Api\Request\User\Suggestion\Slug;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Slug('twitter');
    }

    public function testConstructorSetsSlugCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/users/suggestions/twitter.json',
            $this->request->getEndpoint()->getUrl()
        );
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
