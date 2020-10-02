<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReleasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReleasesTable Test Case
 */
class ReleasesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReleasesTable
     */
    protected $Releases;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Releases',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Releases') ? [] : ['className' => ReleasesTable::class];
        $this->Releases = TableRegistry::getTableLocator()->get('Releases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Releases);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
