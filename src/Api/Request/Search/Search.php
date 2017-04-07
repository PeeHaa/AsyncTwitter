<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Search;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/search/tweets
 */
class Search extends BaseRequest
{
    const METHOD = 'GET';
    const ENDPOINT = '/search/tweets.json';

    private $resultTypes = ['mixed', 'recent', 'popular'];

    public function __construct(string $searchString)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['q'] = $searchString;
    }

    //use string instead of float
    public function setGeocode(string $latitude, string $longitude, string $radius): Search
    {
        $this->parameters['geocode'] = sprintf("%s %s %s", $latitude, $longitude, $radius);

        return $this;
    }

    public function setLanguage(string $language = 'en'): Search
    {
        $this->parameters['lang'] = $language;

        return $this;
    }

    public function setlocale(): Search
    {
        $this->parameters['locale'] = 'ja';

        return $this;
    }

    public function setResultType(string $resultType): Search
    {
        if (in_array($resultType, $this->resultTypes)) {
            $this->parameters['result_type'] = $resultType;
        }

        return $this;
    }

    public function amount(int $amount): Search
    {
        $this->parameters['count'] = (string) $amount;

        return $this;
    }

    public function until(\DateTime $until): Search
    {
        $this->parameters['until'] = $until->format('Y-m-d');

        return $this;
    }

    public function minimumId(int $id): Search
    {
        $this->parameters['since_id'] = (string) $id;

        return $this;
    }

    public function maximumId(int $id): Search
    {
        $this->parameters['max_id'] = (string) $id;

        return $this;
    }

    public function excludeEntities(): Search
    {
        $this->parameters['include_entities'] = 'false';

        return $this;
    }
}