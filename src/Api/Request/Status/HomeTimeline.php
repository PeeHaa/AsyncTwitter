<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/statuses/home_timeline
 */
class HomeTimeline extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/home_timeline.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): HomeTimeline
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): HomeTimeline
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): HomeTimeline
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function trimUser(): HomeTimeline
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }

    public function excludeReplies(): HomeTimeline
    {
        $this->parameters['exclude_replies'] = 'true';

        return $this;
    }

    public function includeContributorDetails(): HomeTimeline
    {
        $this->parameters['contributor_details'] = 'true';

        return $this;
    }

    public function excludeEntities(): HomeTimeline
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
