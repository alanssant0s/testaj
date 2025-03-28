<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistrictsFixture
 */
class DistrictsFixture extends TestFixture
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
                'city_id' => 1,
                'created' => '2023-11-11 14:49:06',
                'modified' => '2023-11-11 14:49:06',
                'deleted' => '2023-11-11 14:49:06',
            ],
        ];
        parent::init();
    }
}
