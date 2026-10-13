<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class NewsPageTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'app.Releases',
        'app.Types',
        'app.Listings',
        'app.Submissions',
        'app.ListingsSubmissions',
    ];

    /**
     * Every hand-written entry is on the page: 20 announcements, 24 press items,
     * 10 talks and 5 other links (59 dated entries) plus 14 publications.
     */
    public function testAllContentIsShown(): void
    {
        $this->get('/news');
        $this->assertResponseOk();
        $body = (string)$this->_response->getBody();

        $this->assertSame(24 + 10 + 5, substr_count($body, '<td class="d">'));
        $this->assertSame(14, substr_count($body, 'class="bib"'));
        $this->assertSame(20 + 1, substr_count($body, '<article class="nw-item'));
        $this->assertStringContainsString('Matt Rásó-Barnett talk at LAD', $body);
        $this->assertStringContainsString('Rice O&amp;G', $body);
    }

    /**
     * The ISC'22 lists were published on 2022-05-30, not 2021-05-30.
     */
    public function testIsc22Date(): void
    {
        $this->get('/news');
        $this->assertResponseNotContains('2021-05-30');
    }

    /**
     * Releases newer than the newest hand-written one (SC23) get a generated entry with
     * each ranked list's #1; unreleased releases and hand-written ones are not generated.
     */
    public function testGeneratesNewerListReleases(): void
    {
        $this->get('/news');
        $body = (string)$this->_response->getBody();

        $this->assertSame(1, substr_count($body, 'nw-release'));
        $this->assertStringContainsString('The ISC24 lists are published', $body);
        $this->assertStringContainsString('/submissions/view/1" class="nw-system">Alpha</a>', $body);
        $this->assertStringContainsString('2 submissions on the Full list', $body);
        $this->assertStringNotContainsString('SC99', $body);
        $this->assertStringNotContainsString('The SC23 lists are published', $body);
        // Same #1 as SC23 Production (submission 1): not tagged new.
        $this->assertStringNotContainsString('class="nw-new"', $body);
    }

    public function testTabsShowCounts(): void
    {
        $this->get('/news');
        $this->assertResponseContains('href="#press" data-tab="press"');
        $this->assertResponseContains('Press</b><span class="nw-count">24</span>');
        $this->assertResponseContains('Publications</b><span class="nw-count">14</span>');
    }
}
