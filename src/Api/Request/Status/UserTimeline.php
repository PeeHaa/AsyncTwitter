<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\BaseRequest;

class UserTimeline extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/user_timeline.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function userId(int $id): UserTimeline
    {
        $this->parameters['user_id'] = (string) $id;

        return $this;
    }

    public function screenName(string $screenName): UserTimeline
    {
        $this->parameters['screen_name'] = $screenName;

        return $this;
    }

    public function amount(int $amount): UserTimeline
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): UserTimeline
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): UserTimeline
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function trimUser(): UserTimeline
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }

    public function excludeReplies(): UserTimeline
    {
        $this->parameters['exclude_replies'] = 'true';

        return $this;
    }

    public function includeContributorDetails(): UserTimeline
    {
        $this->parameters['contributor_details'] = 'true';

        return $this;
    }

    public function excludeRetweets(): UserTimeline
    {
        $this->parameters['include_rts'] = 'false';

        return $this;
    }
}
