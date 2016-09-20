<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Status;

use Amp\Promise;
use PeeHaa\AsyncTwitter\Api\Client;
use PeeHaa\AsyncTwitter\Request\Body;
use PeeHaa\AsyncTwitter\Request\Url;

class Retweet
{
    const ENDPOINT = '/statuses/retweet/%s.json';

    private $client;

    private $id;

    public function __construct(Client $client, int $id)
    {
        $this->client = $client;
        $this->id     = $id;
    }

    public function post(): Promise
    {
        return $this->client->post(new Url(sprintf(self::ENDPOINT, $this->id)), new Body());
    }
}
