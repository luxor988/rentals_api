<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApartmentsFixture
 */
class ApartmentsFixture extends TestFixture
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
                'apartment_type_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'address' => 'Lorem ipsum dolor sit amet',
                'zipcode' => 'Lorem ip',
                'apartment_number' => 'Lorem ip',
                'floor' => 1,
                'rooms' => 1,
                'bathrooms' => 1,
                'has_heating' => 1,
                'has_gas' => 1,
                'has_parking' => 1,
                'apartment_size' => 1,
                'is_occuped' => 1,
                'status_id' => 1,
                'user_id' => 1,
                'created' => '2023-10-24 04:49:08',
                'modified' => '2023-10-24 04:49:08',
            ],
        ];
        parent::init();
    }
}
