<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LearnersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LearnersTable Test Case
 */
class LearnersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LearnersTable
     */
    protected $Learners;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Learners',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Learners') ? [] : ['className' => LearnersTable::class];
        $this->Learners = $this->getTableLocator()->get('Learners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Learners);

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
}
