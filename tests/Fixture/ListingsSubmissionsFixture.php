<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * List memberships. Listing 4 (ISC24 Production) holds seven entries: submission 6
 * is 6th, with its score stored as FLOAT (797.038025 becomes 797.0380249023438),
 * and submissions 8 and 9 tie on 500 (entry 8 before 9). Entry ids restart in every listing,
 * as in the per-list tables behind the real view, so submission 6's entry id 1 also exists
 * in other listings.
 */
class ListingsSubmissionsFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            // SC23 Production: 1, 2, 3, 6
            ['id' => 1, 'listing_id' => 1, 'submission_id' => 1, 'score' => 9000],
            ['id' => 2, 'listing_id' => 1, 'submission_id' => 2, 'score' => 5000],
            ['id' => 3, 'listing_id' => 1, 'submission_id' => 3, 'score' => 3000],
            ['id' => 4, 'listing_id' => 1, 'submission_id' => 6, 'score' => 797.038025],
            // SC23 Research: a tie for #1, the lower entry id (submission 9) wins
            ['id' => 2, 'listing_id' => 2, 'submission_id' => 8, 'score' => 400],
            ['id' => 1, 'listing_id' => 2, 'submission_id' => 9, 'score' => 400],
            // ISC24 Production: carried-over 1, 2, 3, 6 plus new 4, 5, 7, 8, 9
            ['id' => 2, 'listing_id' => 4, 'submission_id' => 1, 'score' => 9000],
            ['id' => 3, 'listing_id' => 4, 'submission_id' => 2, 'score' => 5000],
            ['id' => 4, 'listing_id' => 4, 'submission_id' => 3, 'score' => 3000],
            ['id' => 5, 'listing_id' => 4, 'submission_id' => 4, 'score' => 1000],
            ['id' => 6, 'listing_id' => 4, 'submission_id' => 5, 'score' => 900],
            ['id' => 1, 'listing_id' => 4, 'submission_id' => 6, 'score' => 797.038025],
            ['id' => 7, 'listing_id' => 4, 'submission_id' => 7, 'score' => 600],
            ['id' => 9, 'listing_id' => 4, 'submission_id' => 9, 'score' => 500],
            ['id' => 8, 'listing_id' => 4, 'submission_id' => 8, 'score' => 500],
            // Full lists (unranked)
            ['id' => 1, 'listing_id' => 3, 'submission_id' => 6, 'score' => 797.038025],
            ['id' => 1, 'listing_id' => 6, 'submission_id' => 6, 'score' => 797.038025],
            ['id' => 2, 'listing_id' => 6, 'submission_id' => 11, 'score' => 50],
            // Future SC99 Production
            ['id' => 1, 'listing_id' => 7, 'submission_id' => 10, 'score' => 99999],
            ['id' => 2, 'listing_id' => 7, 'submission_id' => 6, 'score' => 797.038025],
        ];
        parent::init();
    }
}
