<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Client;

use PeeHaa\AsyncTwitter\Api\Client\Client;
use PeeHaa\AsyncTwitter\Api\Client\ClientFactory;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application as ApplicationCredentials;
use PeeHaa\AsyncTwitter\Http\Client as HttpClient;
use PHPUnit\Framework\TestCase;

class ClientFactoryTest extends TestCase
{
    public function testCreate()
    {
        $httpClient             = $this->createMock(HttpClient::class);
        $applicationCredentials = new ApplicationCredentials('TheKey', 'TheSecret');
        $accessToken            = new AccessToken('TheToken', 'TheSecret');

        $factory = new ClientFactory($httpClient, $applicationCredentials);

        $this->assertInstanceOf(Client::class, $factory->create($accessToken));
    }
}
