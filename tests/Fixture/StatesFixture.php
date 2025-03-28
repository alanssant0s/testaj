<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatesFixture
 */
class StatesFixture extends TestFixture
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
                'abbreviation' => 'Lo',
                'created' => '2023-11-11 14:49:19',
                'modified' => '2023-11-11 14:49:19',
                'deleted' => '2023-11-11 14:49:19',
            ],
        ];
        parent::init();
    }
}
