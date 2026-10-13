<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * The four reproducibility levels.
 */
class ReproducibilityScoresFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $now = '2023-01-01 00:00:00';
        $this->records = [
            ['id' => 1, 'name' => 'Undefined', 'description' => 'The lowest level.', 'created' => $now, 'modified' => $now],
            ['id' => 2, 'name' => 'Limited', 'description' => 'Typical system.', 'created' => $now, 'modified' => $now],
            ['id' => 3, 'name' => 'Proprietary', 'description' => 'Not openly available.', 'created' => $now, 'modified' => $now],
            ['id' => 4, 'name' => 'Fully Reproducible', 'description' => 'The highest level.', 'created' => $now, 'modified' => $now],
        ];
        parent::init();
    }
}
