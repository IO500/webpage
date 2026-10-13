<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Two published releases and one in the future (must never be shown).
 */
class ReleasesFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            ['id' => 1, 'acronym' => 'SC23', 'release_date' => '2023-11-14'],
            ['id' => 2, 'acronym' => 'ISC24', 'release_date' => '2024-05-14'],
            ['id' => 3, 'acronym' => 'SC99', 'release_date' => '2099-11-14'],
        ];
        parent::init();
    }
}
