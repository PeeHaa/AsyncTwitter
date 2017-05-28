<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Get\Account;

use PeeHaa\AsyncTwitter\Api\Request\Get\Account\VerifyCredentials;
use PHPUnit\Framework\TestCase;

class VerifyCredentialsTest extends TestCase
{
    /** @var VerifyCredentials */
    private $request;

    public function setUp()
    {
        $this->request = new VerifyCredentials();
    }

    public function testExcludeEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeEntities());
    }

    public function testExcludeEntitiesSetsCorrectly()
    {
        $this->request->excludeEntities();

        $this->assertSame('include_entities', $this->request->getParameters()[0]->getKey());
        $this->assertSame('false', $this->request->getParameters()[0]->getValue());
    }

    public function testSkipStatusReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->skipStatus());
    }

    public function testSkipStatusSetsCorrectly()
    {
        $this->request->skipStatus();

        $this->assertSame('skip_status', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }

    public function testIncludeEmailReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->includeEmail());
    }

    public function testIncludeEmailSetsCorrectly()
    {
        $this->request->includeEmail();

        $this->assertSame('include_email', $this->request->getParameters()[0]->getKey());
        $this->assertSame('true', $this->request->getParameters()[0]->getValue());
    }
}
