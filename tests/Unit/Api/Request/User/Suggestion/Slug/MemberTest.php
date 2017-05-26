<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\User\Suggestion\Slug;

use PeeHaa\AsyncTwitter\Api\Request\User\Suggestion\Slug\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Member('twitter');
    }

    public function testConstructorSetsSlugCorrectly()
    {
        $this->assertSame(
            'https://api.twitter.com/1.1/users/suggestions/twitter/members.json',
            $this->request->getEndpoint()->getUrl()
        );
    }
}
