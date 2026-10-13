<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Two ranked list types and the unranked Full list, with the ids they have in the real
 * database (Production 15, Research 1, Full 3), which SubmissionsTable::bestListing() relies on for ties.
 */
class TypesFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            ['id' => 1, 'name' => 'Research', 'url' => 'io500', 'position' => 3, 'ranked' => 1],
            ['id' => 3, 'name' => 'Full', 'url' => 'full', 'position' => 5, 'ranked' => 0],
            ['id' => 15, 'name' => 'Production', 'url' => 'production', 'position' => 1, 'ranked' => 1],
        ];
        parent::init();
    }
}
