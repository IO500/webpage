<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class SubmissionsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'app.Releases',
        'app.Types',
        'app.Listings',
        'app.Submissions',
        'app.ListingsSubmissions',
    ];

    public function testViewRendersPublishedSubmission(): void
    {
        $this->get('/submissions/view/6');
        $this->assertResponseOk();
        $this->assertResponseContains('Shaheen-like');
    }

    /**
     * A submission that is only on lists of an unreleased release is not shown.
     */
    public function testViewRedirectsUnreleasedSubmission(): void
    {
        $this->get('/submissions/view/10');
        $this->assertRedirect('/');
    }

    public function testCompareReturnsListEntriesAndHistory(): void
    {
        $this->get('/submissions/compare/6/4');
        $this->assertResponseOk();
        $this->assertContentType('application/json');
        $this->assertHeaderContains('Cache-Control', 'max-age');

        $data = json_decode((string)$this->_response->getBody(), true);
        $this->assertSame(4, $data['listing_id']);
        $this->assertCount(9, $data['entries']);
        $this->assertSame(['SC23', 'ISC24'], $data['history']['releases']);
        $this->assertStringNotContainsString('information_submitter', (string)$this->_response->getBody());
        $this->assertStringNotContainsString('user_id', (string)$this->_response->getBody());
    }

    /**
     * Only released, ranked lists the submission is on can be compared against.
     */
    public function testCompareRejectsOtherListings(): void
    {
        $this->get('/submissions/compare/6/7'); // unreleased SC99 Production
        $this->assertResponseCode(404);
        $this->get('/submissions/compare/6/3'); // unranked Full list
        $this->assertResponseCode(404);
        $this->get('/submissions/compare/6/2'); // SC23 Research: submission 6 is not on it
        $this->assertResponseCode(404);
        $this->get('/submissions/compare/999/4'); // unknown submission
        $this->assertResponseCode(404);
    }

    /**
     * The ranking history shows whenever the submission is on a ranked list, even one.
     */
    public function testRankingHistoryAlwaysShown(): void
    {
        $this->get('/submissions/view/6'); // SC23 and ISC24 Production
        $this->assertResponseContains('id="sp-lists"');
        $this->assertResponseContains('Submitted');

        $this->get('/submissions/view/4'); // ISC24 Production only
        $this->assertResponseOk();
        $this->assertResponseContains('id="sp-lists"');
    }

    public function testViewWithoutSubmissionDate(): void
    {
        $this->get('/submissions/view/7');
        $this->assertResponseOk();
        $this->assertResponseNotContains('Submitted');
        // The file-system name already starts with the vendor: not repeated in the header.
        $this->assertResponseContains('Inst G · Vendor 7 Store');
    }

    /**
     * ?list= picks the list to compare against when the submission is on it.
     */
    public function testListQueryParameterSelectsList(): void
    {
        $this->get('/submissions/view/6?list=1');
        $this->assertResponseContains('"comparison":{"listing_id":1,');
        $this->get('/submissions/view/6?list=7'); // unreleased: falls back to the latest
        $this->assertResponseContains('"comparison":{"listing_id":4,');
    }
}
