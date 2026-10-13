<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubmissionsTable;
use Cake\TestSuite\TestCase;

class SubmissionsTableTest extends TestCase
{
    protected array $fixtures = [
        'app.Releases',
        'app.Types',
        'app.Listings',
        'app.Submissions',
        'app.ListingsSubmissions',
    ];

    protected SubmissionsTable $Submissions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->Submissions = $this->getTableLocator()->get('Submissions');
    }

    /**
     * A FLOAT list score (797.038025 is stored as 797.0380249023438) must not count
     * itself as "higher" when PHP rounds it to 14 digits: five entries are above it.
     */
    public function testRankDoesNotCountItselfForFloatScores(): void
    {
        $isc24 = array_column($this->Submissions->listMemberships(6), null, 'listing_id')[4];

        $this->assertSame(6, $isc24['rank']);
        $this->assertSame(9, $isc24['total']);
    }

    /**
     * Equal scores are ranked by list entry id, the same order the list page uses.
     */
    public function testRankBreaksTiesByEntryId(): void
    {
        $rank = fn(int $submission, int $listing) => array_column(
            $this->Submissions->listMemberships($submission),
            'rank',
            'listing_id',
        )[$listing];

        $this->assertSame(8, $rank(8, 4));
        $this->assertSame(9, $rank(9, 4));
        // SC23 Research: same score, entry 1 (submission 9) before entry 2 (submission 8).
        $this->assertSame(1, $rank(9, 2));
        $this->assertSame(2, $rank(8, 2));
    }

    /**
     * The best released entry gates the tabs: none for a submission only on lists of an
     * unreleased release; the latest Production list otherwise (type id, then date, on ties).
     */
    public function testBestListing(): void
    {
        $this->assertNull($this->Submissions->bestListing($this->Submissions->get(10)));
        $this->assertSame(4, $this->Submissions->bestListing($this->Submissions->get(6))->listing_id);
    }

    /**
     * Memberships cover released, ranked lists only, newest release first, with ranks
     * computed in SQL.
     */
    public function testListMembershipsRankedAndReleasedOnly(): void
    {
        $rows = $this->Submissions->listMemberships(6);

        $this->assertSame([4, 1], array_column($rows, 'listing_id'));
        $this->assertSame(['ISC24', 'SC23'], array_column($rows, 'release'));
        $this->assertSame(['Production', 'Production'], array_column($rows, 'type_name'));
        $this->assertSame([6, 4], array_column($rows, 'rank'));
        $this->assertSame([9, 4], array_column($rows, 'total'));
    }

    /**
     * Comparison data lists a listing's entries in rank order with whitelisted fields only.
     */
    public function testComparisonData(): void
    {
        $rows = $this->Submissions->comparisonData(4);

        $this->assertCount(9, $rows);
        $this->assertSame([1, 2, 3, 4, 5, 6, 7, 8, 9], array_column($rows, 'rank'));
        $this->assertSame([1, 2, 3, 4, 5, 6, 7, 8, 9], array_column($rows, 'submission_id'));
        $this->assertSame('Shaheen-like', $rows[5]['system']);
        $this->assertEqualsWithDelta(797.038113 / 5, $rows[5]['ior_easy_write'], 0.001);
        $this->assertArrayNotHasKey('information_submitter', $rows[0]);
    }

    /**
     * Position history: this submission and its neighbours (within 3 places at the latest
     * release) across every released list of the type it is on.
     */
    public function testPositionHistory(): void
    {
        $history = $this->Submissions->positionHistory(6, 15);

        $this->assertSame(['SC23', 'ISC24'], $history['releases']);
        $series = array_column($history['series'], null, 'submission_id');
        $this->assertSame([4, 6], $series[6]['ranks']);
        $this->assertTrue($series[6]['self']);
        // Ranks 3-9 at ISC24, except itself.
        $this->assertEqualsCanonicalizing([3, 4, 5, 7, 8, 9], array_diff(array_keys($series), [6]));
        $this->assertSame([3, 3], $series[3]['ranks']);
        $this->assertSame([null, 4], $series[4]['ranks']);
    }
}
