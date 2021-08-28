<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListingsSubmissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListingsSubmissionsTable Test Case
 */
class ListingsSubmissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListingsSubmissionsTable
     */
    protected $ListingsSubmissions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ListingsSubmissions',
        'app.Listings',
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
        $config = $this->getTableLocator()->exists('ListingsSubmissions') ? [] : ['className' => ListingsSubmissionsTable::class];
        $this->ListingsSubmissions = $this->getTableLocator()->get('ListingsSubmissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ListingsSubmissions);

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
