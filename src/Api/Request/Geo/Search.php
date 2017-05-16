<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

/**
 * @link https://dev.twitter.com/rest/reference/get/geo/search
 */
class Search extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/geo/search.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function latitude(string $latitude): Search
    {
        $this->parameters['lat'] = $latitude;

        return $this;
    }

    public function longitude(string $longitude): Search
    {
        $this->parameters['long'] = $longitude;

        return $this;
    }

    public function query(string $query): Search
    {
        $this->parameters['query'] = $query;

        return $this;
    }

    public function ip(string $ip): Search
    {
        $this->parameters['ip'] = $ip;

        return $this;
    }

    public function granularity(string $granularity): Search
    {
        if (!in_array($granularity, ['poi', 'neighborhood', 'city', 'admin', 'county'], true)) {
            throw new InvalidGranularityException();
        }

        $this->parameters['granularity'] = $granularity;

        return $this;
    }

    public function accuracy(string $accuracy): Search
    {
        $this->parameters['accuracy'] = $accuracy;

        return $this;
    }

    public function amount(int $amount): Search
    {
        $this->parameters['max_results'] = (string) $amount;

        return $this;
    }

    public function containedWithin(string $placeId): Search
    {
        $this->parameters['contained_within'] = $placeId;

        return $this;
    }

    public function streetAddress(string $address): Search
    {
        $this->parameters['attribute:street_address'] = $address;

        return $this;
    }

    public function callback(string $callback): Search
    {
        $this->parameters['callback'] = $callback;

        return $this;
    }
}
