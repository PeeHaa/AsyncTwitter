<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use PeeHaa\AsyncTwitter\Api\Request;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;

class Update implements Request
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/update.json';

    private $message;

    private $parameters = [];

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getBody(): Body
    {
        $parameters = [new Parameter('status', $this->message)];

        foreach ($this->parameters as $key => $value) {
            $parameters[] = new Parameter($key, $value);
        }

        return new Body(...$parameters);
    }

    public function getEndpoint(): Url
    {
        return new Url(self::ENDPOINT);
    }

    public function replyTo(int $id): Update
    {
        $this->parameters['in_reply_to_status_id'] = (string) $id;

        return $this;
    }

    public function isSensitive(): Update
    {
        $this->parameters['possibly_sensitive'] = 'true';

        return $this;
    }

    public function setLatitude(float $latitude): Update
    {
        $this->parameters['lat'] = (string) $latitude;

        return $this;
    }

    public function setLongitude(float $longitude): Update
    {
        $this->parameters['long'] = (string) $longitude;

        return $this;
    }

    public function displayCoordinates(): Update
    {
        $this->parameters['display_coordinates'] = 'true';

        return $this;
    }

    public function trimUser(): Update
    {
        $this->parameters['trim_user'] = 'true';

        return $this;
    }
}
