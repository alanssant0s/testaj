<?php

declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImportsFixture
 */
class ImportsFixture extends TestFixture
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
                'user_id' => 1,
                'total_processes' => 1,
                'created' => '2024-08-17 15:03:18',
                'modified' => '2024-08-17 15:03:18',
                'deleted' => '2024-08-17 15:03:18',
            ],
        ];
        parent::init();
    }
}
