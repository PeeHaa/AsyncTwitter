<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use Amp\Promise;
use PeeHaa\AsyncTwitter\Api\Client;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;

class Update
{
    const ENDPOINT = '/statuses/update.json';

    private $client;

    private $message;

    public function __construct(Client $client, string $message)
    {
        $this->client  = $client;
        $this->message = $message;
    }

    public function post(): Promise
    {
        return $this->client->post(new Url(self::ENDPOINT), new Body(...[new Parameter('status', $this->message)]));
    }
}
