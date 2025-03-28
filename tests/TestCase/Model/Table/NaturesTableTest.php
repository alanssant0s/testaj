<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NaturesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NaturesTable Test Case
 */
class NaturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NaturesTable
     */
    protected $Natures;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Natures',
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
        $config = $this->getTableLocator()->exists('Natures') ? [] : ['className' => NaturesTable::class];
        $this->Natures = $this->getTableLocator()->get('Natures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Natures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NaturesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
