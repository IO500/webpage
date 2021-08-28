<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListingsTable Test Case
 */
class ListingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListingsTable
     */
    protected $Listings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Listings',
        'app.Types',
        'app.Releases',
        'app.ListSc1810node',
        'app.ListSc18Io500',
        'app.Submissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Listings') ? [] : ['className' => ListingsTable::class];
        $this->Listings = $this->getTableLocator()->get('Listings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Listings);

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
