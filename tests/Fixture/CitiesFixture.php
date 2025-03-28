<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
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
                'state_id' => 1,
                'created' => '2023-11-11 14:49:14',
                'modified' => '2023-11-11 14:49:14',
                'deleted' => '2023-11-11 14:49:14',
            ],
        ];
        parent::init();
    }
}
