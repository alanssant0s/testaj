<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CasosFixture
 */
class CasosFixture extends TestFixture
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
                'created' => '2023-11-11 20:47:40',
                'modified' => '2023-11-11 20:47:40',
                'deleted' => '2023-11-11 20:47:40',
            ],
        ];
        parent::init();
    }
}
