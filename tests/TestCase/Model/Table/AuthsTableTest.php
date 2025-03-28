<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthsTable Test Case
 */
class AuthsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthsTable
     */
    protected $Auths;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Auths',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Auths') ? [] : ['className' => AuthsTable::class];
        $this->Auths = $this->getTableLocator()->get('Auths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Auths);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AuthsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
