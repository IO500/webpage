<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * One listing per release and type (ids 1-3: SC23, 4-6: ISC24, 7: future SC99).
 */
class ListingsFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            ['id' => 1, 'type_id' => 15, 'release_id' => 1, 'description' => 'SC23 Production'],
            ['id' => 2, 'type_id' => 1, 'release_id' => 1, 'description' => 'SC23 Research'],
            ['id' => 3, 'type_id' => 3, 'release_id' => 1, 'description' => 'SC23 Full'],
            ['id' => 4, 'type_id' => 15, 'release_id' => 2, 'description' => 'ISC24 Production'],
            ['id' => 5, 'type_id' => 1, 'release_id' => 2, 'description' => 'ISC24 Research'],
            ['id' => 6, 'type_id' => 3, 'release_id' => 2, 'description' => 'ISC24 Full'],
            ['id' => 7, 'type_id' => 15, 'release_id' => 3, 'description' => 'SC99 Production'],
        ];
        parent::init();
    }
}
