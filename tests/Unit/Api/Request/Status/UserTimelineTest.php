<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Status\UserTimeline;
use PHPUnit\Framework\TestCase;

class UserTimelineTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new UserTimeline();
    }

    public function testReplyToReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->userId(13));
    }

    public function testReplyToSetsCorrectly()
    {
        $this->request->userId(13);

        $this->assertSame('user_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testScreenNameReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->screenName('PHPeeHaa'));
    }

    public function testScreenNameSetsCorrectly()
    {
        $this->request->screenName('PHPeeHaa');

        $this->assertSame('screen_name', $this->request->getParameters()[0]->getKey());
        $this->assertSame('PHPeeHaa', $this->request->getParameters()[0]->getValue());
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[0]->getKey());
        $this->assertSame('10', $this->request->getParameters()[0]->getValue());
    }

    public function testMinimumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->minimumId(13));
    }

    public function testMinimumIdSetsCorrectly()
    {
        $this->request->minimumId(13);

        $this->assertSame('since_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testMaximumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->maximumId(13));
    }

    public function testMaximumIdSetsCorrectly()
    {
        $this->request->maximumId(13);

        $this->assertSame('max_id', $this->request->getParameters()[0]->getKey());
        $this->assertSame('13', $this->request->getParameters()[0]->getValue());
    }

    public function testTrimUserReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->trimUser());
    }

    public function testTrimUserSetsCorrectly()
    {
        $this->request->trimUser();

        $this->assertSame('trim_user', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }

    public function testExcludeRepliesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeReplies());
    }

    public function testExcludeRepliesSetsCorrectly()
    {
        $this->request->excludeReplies();

        $this->assertSame('exclude_replies', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }

    public function testIncludeContributorDetailsReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->includeContributorDetails());
    }

    public function testIncludeContributorDetailsSetsCorrectly()
    {
        $this->request->includeContributorDetails();

        $this->assertSame('contributor_details', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }

    public function testExcludeRetweetsReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeRetweets());
    }

    public function testExcludeRetweetsSetsCorrectly()
    {
        $this->request->excludeRetweets();

        $this->assertSame('include_rts', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }
}
