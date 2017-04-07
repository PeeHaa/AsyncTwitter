<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/statuses/mentions_timeline
 */
class MentionsTimeline extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/statuses/mentions_timeline.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function amount(int $amount): MentionsTimeline
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function minimumId(int $id): MentionsTimeline
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): MentionsTimeline
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function trimUser(): MentionsTimeline
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }

    public function includeContributorDetails(): MentionsTimeline
    {
        $this->parameters['contributor_details'] = 'true';

        return $this;
    }

    public function excludeEntities(): MentionsTimeline
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}
