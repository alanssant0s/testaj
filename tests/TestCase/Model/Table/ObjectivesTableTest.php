<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObjectivesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObjectivesTable Test Case
 */
class ObjectivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObjectivesTable
     */
    protected $Objectives;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Objectives',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Objectives') ? [] : ['className' => ObjectivesTable::class];
        $this->Objectives = $this->getTableLocator()->get('Objectives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Objectives);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ObjectivesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
