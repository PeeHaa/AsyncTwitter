<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Request;

use PeeHaa\AsyncTwitter\Request\FieldParameter;
use PeeHaa\AsyncTwitter\Request\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    private $url;

    public function setUp()
    {
        $parameters = [
            new FieldParameter('key1', 'value1'),
            new FieldParameter('key2', 'value2'),
            new FieldParameter('key3', 'value3'),
        ];

        $this->url  = new Url('https://api.twitter.com/1.1', '/statuses/endpoint', ...$parameters);
    }

    public function testGetBaseString()
    {
        $this->assertSame('https://api.twitter.com/1.1/statuses/endpoint', $this->url->getBaseString());
    }

    public function testGetQueryStringParameters()
    {
        $this->assertSame(3, count($this->url->getQueryStringParameters()));
    }

    public function testGetUrlWithoutQueryString()
    {
        $url = new Url('https://api.twitter.com/1.1', '/statuses/endpoint');

        $this->assertSame('https://api.twitter.com/1.1/statuses/endpoint', $url->getUrl());
    }

    public function testGetUrlWithQueryString()
    {
        $url = 'https://api.twitter.com/1.1/statuses/endpoint?key1=value1&key2=value2&key3=value3';

        $this->assertSame($url, $this->url->getUrl());
    }
}
