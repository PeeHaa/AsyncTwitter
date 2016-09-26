<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use PeeHaa\AsyncTwitter\Api\BaseRequest;

class Update extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/statuses/update.json';

    public function __construct(string $message)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['status'] = $message;
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
