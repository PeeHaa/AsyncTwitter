<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Oauth;

use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Oauth\Parameters;
use PeeHaa\AsyncTwitter\Request\Parameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    private $parameters;

    public function setUp()
    {
        $this->parameters = $this->createNewParameters();
    }

    private function createNewParameters(): Parameters
    {
        return new Parameters(
            new Application('ApplicationKey', 'ApplicationSecret'),
            new AccessToken('AccessToken', 'AccessSecret'),
            new Url('/statuses/endpoint'),
            ...[new Parameter('key1', 'value1')]
        );
    }

    public function testGetConsumerKey()
    {
        $this->assertSame('ApplicationKey', $this->parameters->getConsumerKey());
    }

    public function testGetNonceHasCorrectLength()
    {
        $this->assertSame(32, strlen($this->parameters->getNonce()));
    }

    public function testGetNonceHasNoDuplicates()
    {
        $nonces = [];

        for ($i = 0; $i < 100; $i++) {
            $nonce = $this->createNewParameters()->getNonce();

            $this->assertFalse(in_array($nonce, $nonces, true));

            $nonces[] = $nonce;
        }
    }

    public function testGetSignatureMethod()
    {
        $this->assertSame('HMAC-SHA1', $this->parameters->getSignatureMethod());
    }

    public function testGetTimestamp()
    {
        $currentTimestamp = (new \DateTimeImmutable())->format('U');
        $parameters       = $this->createNewParameters();

        $this->assertTrue(
            $currentTimestamp === $parameters->getTimestamp() || ($currentTimestamp + 1) === $parameters->getTimestamp()
        );
    }

    public function testGetToken()
    {
        $this->assertSame('AccessToken', $this->parameters->getToken());
    }

    public function testGetVersion()
    {
        $this->assertSame('1.0', $this->parameters->getVersion());
    }

    public function testGetAllReturnsAnArrayWithAllElements()
    {
        $this->assertTrue(array_key_exists('oauth_consumer_key', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('oauth_token', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('oauth_nonce', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('oauth_timestamp', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('oauth_signature_method', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('oauth_version', $this->parameters->getAll()));
        $this->assertTrue(array_key_exists('key1', $this->parameters->getAll()));
    }

    public function testGetAllReturnsAnArrayWithAllValues()
    {
        $this->assertTrue($this->parameters->getAll()['oauth_consumer_key'] === 'ApplicationKey');
        $this->assertTrue($this->parameters->getAll()['oauth_token'] === 'AccessToken');
        $this->assertTrue($this->parameters->getAll()['oauth_nonce'] === $this->parameters->getNonce());
        $this->assertTrue($this->parameters->getAll()['oauth_signature_method'] === 'HMAC-SHA1');
        $this->assertTrue($this->parameters->getAll()['oauth_version'] === '1.0');
        $this->assertTrue($this->parameters->getAll()['key1'] === 'value1');
    }
}
