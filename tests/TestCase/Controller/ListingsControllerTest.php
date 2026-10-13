<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ListingsControllerTest extends TestCase
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
     * Tied scores are listed by entry id, matching the rank on the submission page.
     */
    public function testListBreaksTiesByEntryId(): void
    {
        $this->get('/list/isc24/production');
        $this->assertResponseOk();

        $body = (string)$this->_response->getBody();
        $this->assertLessThan(strpos($body, 'Iota'), strpos($body, 'Theta'));
        // The system name links to its submission.
        $this->assertMatchesRegularExpression('#href="/submissions/view/6" class="identity-system">Shaheen-like<#', $body);
    }

    /**
     * Lists of a release that is not out yet are not served.
     */
    public function testHomeServesLatestPublishedRelease(): void
    {
        $this->get('/');
        $this->assertResponseOk();
        $this->assertResponseContains('ISC24');
        $this->assertResponseNotContains('Future');
        // The home URL names no list type; the Production tab is still marked active.
        $this->assertMatchesRegularExpression('#list/isc24/production" class="tab tab-active"#', (string)$this->_response->getBody());
    }

    /**
     * Entries without an institution still render (link() rejects a null title).
     */
    public function testListWithMissingInstitution(): void
    {
        $this->get('/list/isc24/full');
        $this->assertResponseOk();
        $this->assertResponseContains('Kappa');
    }

    /**
     * Only the columns the table header sorts on are accepted; anything else (SQL,
     * private columns, arrays) is ignored and the list keeps its ranked order.
     */
    public function testSortAcceptsOnlyListedColumns(): void
    {
        $ranked = ['Alpha', 'Beta', 'Gamma', 'Delta', 'Epsilon', 'Shaheen-like', 'Eta', 'Theta', 'Iota'];

        $this->get('/list/isc24/production?sort=information_system&direction=asc');
        $this->assertResponseOk();
        $alphabetical = $ranked;
        sort($alphabetical);
        $this->assertSame($alphabetical, $this->systems());

        foreach (['RAND()', 'Submissions.information_submitter', 'information_submitter', '(SELECT 1)'] as $sort) {
            $this->get('/list/isc24/production?sort=' . urlencode($sort) . '&direction=asc');
            $this->assertResponseOk();
            $this->assertSame($ranked, $this->systems(), $sort);
        }

        $this->get('/list/isc24/production?sort[]=x');
        $this->assertResponseOk();
        $this->assertSame($ranked, $this->systems());
    }

    /**
     * @return list<string> System names in the order the list shows them.
     */
    private function systems(): array
    {
        preg_match_all('#class="identity-system">([^<]+)<#', (string)$this->_response->getBody(), $m);

        return $m[1];
    }
}
