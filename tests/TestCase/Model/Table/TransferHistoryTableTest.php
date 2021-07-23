<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferHistoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferHistoryTable Test Case
 */
class TransferHistoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferHistoryTable
     */
    protected $TransferHistory;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TransferHistory',
        'app.Leaners',
        'app.FromSchools',
        'app.ToSchools',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TransferHistory') ? [] : ['className' => TransferHistoryTable::class];
        $this->TransferHistory = $this->getTableLocator()->get('TransferHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TransferHistory);

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
