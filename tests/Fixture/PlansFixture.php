<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlansFixture
 */
class PlansFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor sit amet',
                'recurrence' => 'Lorem ipsum dolor sit amet',
                'plan_value' => 1.5,
                'paid_value' => 1.5,
                'discount' => 1.5,
                'created' => '2023-11-11 14:48:23',
                'modified' => '2023-11-11 14:48:23',
                'deleted' => '2023-11-11 14:48:23',
            ],
        ];
        parent::init();
    }
}
