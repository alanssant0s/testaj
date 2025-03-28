<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasosTable Test Case
 */
class CasosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CasosTable
     */
    protected $Casos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Casos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Casos') ? [] : ['className' => CasosTable::class];
        $this->Casos = $this->getTableLocator()->get('Casos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Casos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CasosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
