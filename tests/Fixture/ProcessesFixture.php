<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProcessesFixture
 */
class ProcessesFixture extends TestFixture
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
                'process_number' => '1557657c-72e2-4ac0-a382-80fc55e74d66',
                'nature_id' => 1,
                'object_id' => 1,
                'caso_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'jurisprudence' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'airline_company_id' => 1,
                'district_id' => 1,
                'date' => '2023-11-11',
                'result_id' => 1,
                'type_id' => 1,
                'value_requests' => 1.5,
                'judge_id' => 1,
                'created' => '2023-11-11 21:23:42',
                'modified' => '2023-11-11 21:23:42',
                'deleted' => '2023-11-11 21:23:42',
            ],
        ];
        parent::init();
    }
}
