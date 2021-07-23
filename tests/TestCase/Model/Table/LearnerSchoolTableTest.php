<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LearnerSchoolTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LearnerSchoolTable Test Case
 */
class LearnerSchoolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LearnerSchoolTable
     */
    protected $LearnerSchool;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LearnerSchool',
        'app.Leaners',
        'app.Schools',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LearnerSchool') ? [] : ['className' => LearnerSchoolTable::class];
        $this->LearnerSchool = $this->getTableLocator()->get('LearnerSchool', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LearnerSchool);

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
