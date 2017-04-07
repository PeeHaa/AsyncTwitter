<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitterTest\Api\Request\Status;

use PeeHaa\AsyncTwitter\Api\Request\Search\Search;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Search('Search Text');
    }

    public function testQueryText()
    {
        $this->assertTrue(is_string($this->request->getParameters()[0]->getValue()));
    }

    public function testGeocodeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->geocode('37.781157', '-122.398720', '1mi'));
    }

    public function testGeocodeSetsCorrectly()
    {
        $this->request->geocode('37.781157', '-122.398720', '1mi');

        $this->assertSame('geocode', $this->request->getParameters()[1]->getKey());
        $this->assertSame('37.781157 -122.398720 1mi', $this->request->getParameters()[1]->getValue());
    }

    public function testLanguageReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->language('fr'));
    }

    public function testLanguageSetsCorrectly()
    {
        $this->request->language('fr');
        
        $this->assertSame('lang', $this->request->getParameters()[1]->getKey());
        $this->assertSame('fr', $this->request->getParameters()[1]->getValue());
    }

    public function testLocaleReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->locale());
    }

    public function testLocaleSetsCorrectly()
    {        
        $this->request->locale();
        
        $this->assertSame('locale', $this->request->getParameters()[1]->getKey());
        $this->assertSame('ja', $this->request->getParameters()[1]->getValue());
    }

    public function testResultTypeReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->resultType('mixed'));
    }

    public function testResultTypeSetsCorrectly()
    {        
        $this->request->resultType('mixed');
        
        $this->assertSame('result_type', $this->request->getParameters()[1]->getKey());
        $this->assertSame('mixed', $this->request->getParameters()[1]->getValue());
    }

    public function testAmountReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->amount(10));
    }

    public function testAmountSetsCorrectly()
    {
        $this->request->amount(10);

        $this->assertSame('count', $this->request->getParameters()[1]->getKey());
        $this->assertSame('10', $this->request->getParameters()[1]->getValue());
    }

    public function testUntilReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->until(new \DateTime('13-04-2016')));
    }

    public function testUntilSetsCorrectly()
    {
        $this->request->until(new \DateTime('13-04-2016'));

        $this->assertSame('until', $this->request->getParameters()[1]->getKey());
        $this->assertSame('2016-04-13', $this->request->getParameters()[1]->getValue());
    }

    public function testMinimumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->minimumId(13));
    }

    public function testMinimumIdSetsCorrectly()
    {
        $this->request->minimumId(13);

        $this->assertSame('since_id', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13', $this->request->getParameters()[1]->getValue());
    }

    public function testMaximumIdReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->maximumId(13));
    }

    public function testMaximumIdSetsCorrectly()
    {
        $this->request->maximumId(13);

        $this->assertSame('max_id', $this->request->getParameters()[1]->getKey());
        $this->assertSame('13', $this->request->getParameters()[1]->getValue());
    }

    public function testExcludeEntitiesReturnsSelf()
    {
        $this->assertSame($this->request, $this->request->excludeEntities());
    }

    public function testExcludeEntitiesSetsCorrectly()
    {
        $this->request->excludeEntities();

        $this->assertSame('include_entities', $this->request->getParameters()[1]->getKey());
        $this->assertSame('false', $this->request->getParameters()[1]->getValue());
    }
}
