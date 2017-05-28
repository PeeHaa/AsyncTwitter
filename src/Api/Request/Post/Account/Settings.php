<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Post\Account;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/post/account/settings
 */
class Settings extends BaseRequest
{
    const METHOD   = 'POST';

    const ENDPOINT = '/account/remove_profile_banner.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function enableSleepTime(): Settings
    {
        $this->parameters['sleep_time_enabled'] = 'true';

        return $this;
    }

    public function disableSleepTime(): Settings
    {
        $this->parameters['sleep_time_enabled'] = 'false';

        return $this;
    }

    public function sleepTimeStart(int $hour): Settings
    {
        $this->parameters['start_sleep_time'] = str_pad((string) $hour, 2, '0', STR_PAD_LEFT);

        return $this;
    }

    public function sleepTimeEnd(int $hour): Settings
    {
        $this->parameters['end_sleep_time'] = str_pad((string) $hour, 2, '0', STR_PAD_LEFT);

        return $this;
    }

    public function timeZone(string $timeZone): Settings
    {
        $this->parameters['time_zone'] = $timeZone;

        return $this;
    }

    public function trendLocationWoeId(int $woeId): Settings
    {
        $this->parameters['trend_location_woeid'] = (string) $woeId;

        return $this;
    }

    public function language(string $language): Settings
    {
        $this->parameters['lang'] = $language;

        return $this;
    }
}
