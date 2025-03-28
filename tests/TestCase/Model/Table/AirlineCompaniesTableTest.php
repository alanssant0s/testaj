<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AirlineCompaniesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AirlineCompaniesTable Test Case
 */
class AirlineCompaniesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AirlineCompaniesTable
     */
    protected $AirlineCompanies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AirlineCompanies',
        'app.Processes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AirlineCompanies') ? [] : ['className' => AirlineCompaniesTable::class];
        $this->AirlineCompanies = $this->getTableLocator()->get('AirlineCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AirlineCompanies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AirlineCompaniesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
