<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JudgesFixture
 */
class JudgesFixture extends TestFixture
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
                'created' => '2023-11-11 14:48:52',
                'modified' => '2023-11-11 14:48:52',
                'deleted' => '2023-11-11 14:48:52',
            ],
        ];
        parent::init();
    }
}
