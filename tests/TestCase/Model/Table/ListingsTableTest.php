<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListingsTable;
use Cake\TestSuite\TestCase;

class ListingsTableTest extends TestCase
{
    protected array $fixtures = [
        'app.Releases',
        'app.Types',
        'app.Listings',
        'app.Submissions',
        'app.ListingsSubmissions',
    ];

    protected ListingsTable $Listings;

    protected function setUp(): void
    {
        parent::setUp();
        $this->Listings = $this->getTableLocator()->get('Listings');
    }

    /**
     * The #1 of each ranked list of a release, in list-type order, and the Full list size.
     */
    public function testReleaseWinners(): void
    {
        $winners = $this->Listings->releaseWinners([1, 2]);

        // ISC24: Production has a #1; Research (listing 5) is empty, so it is left out.
        $this->assertSame(2, $winners[2]['full']);
        $this->assertSame(['Production'], array_column($winners[2]['lists'], 'type'));
        $this->assertSame(1, $winners[2]['lists'][0]['submission_id']);
        $this->assertSame('Alpha', $winners[2]['lists'][0]['system']);
        $this->assertEqualsWithDelta(9000, $winners[2]['lists'][0]['score'], 0.01);

        // SC23: Production then Research (type position); the Research tie goes to the
        // lower entry id, as on the list page.
        $this->assertSame(['Production', 'Research'], array_column($winners[1]['lists'], 'type'));
        $this->assertSame(9, $winners[1]['lists'][1]['submission_id']);
        $this->assertSame(1, $winners[1]['full']);
    }

    public function testReleaseWinnersOfNothing(): void
    {
        $this->assertSame([], $this->Listings->releaseWinners([]));
    }
}
