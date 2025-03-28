<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JudgesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JudgesTable Test Case
 */
class JudgesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JudgesTable
     */
    protected $Judges;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Judges',
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
        $config = $this->getTableLocator()->exists('Judges') ? [] : ['className' => JudgesTable::class];
        $this->Judges = $this->getTableLocator()->get('Judges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Judges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JudgesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
