<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObjectivesFixture
 */
class ObjectivesFixture extends TestFixture
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
                'created' => '2023-11-11 20:11:05',
                'modified' => '2023-11-11 20:11:05',
                'deleted' => '2023-11-11 20:11:05',
            ],
        ];
        parent::init();
    }
}
