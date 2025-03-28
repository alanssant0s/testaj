<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthsFixture
 */
class AuthsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-11 18:36:23',
                'modified' => '2023-11-11 18:36:23',
                'deleted' => '2023-11-11 18:36:23',
            ],
        ];
        parent::init();
    }
}
