<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'plan_id' => 1,
                'auth_id' => 1,
                'photo_url' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-11 14:48:06',
                'modified' => '2023-11-11 14:48:06',
                'deleted' => '2023-11-11 14:48:06',
            ],
        ];
        parent::init();
    }
}
