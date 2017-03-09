<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\Geo;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class ReverseGeoCode extends BaseRequest
{
    const METHOD   = 'GET';
    const ENDPOINT = '/geo/reverse_geocode.json';

    // we use string type declaration instead of float, because of precision platform independence
    public function __construct(string $latitude, string $longitude)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['lat']  = $latitude;
        $this->parameters['long'] = $longitude;
    }

    public function accuracy(string $accuracy): ReverseGeoCode
    {
        $this->parameters['accuracy'] = $accuracy;

        return $this;
    }

    public function granularity(string $granularity): ReverseGeoCode
    {
        if (!in_array($granularity, ['poi', 'neighborhood', 'city', 'admin', 'county'], true)) {
            throw new InvalidGranularityException();
        }

        $this->parameters['granularity'] = $granularity;

        return $this;
    }

    public function amount(int $amount): ReverseGeoCode
    {
        $this->parameters['max_results'] = (string) $amount;

        return $this;
    }

    public function callback(string $callback): ReverseGeoCode
    {
        $this->parameters['callback'] = $callback;

        return $this;
    }
}
