<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApartmentTypesFixture
 */
class ApartmentTypesFixture extends TestFixture
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
                'code' => 'Lorem ip',
                'status_id' => 1,
                'created' => '2023-10-24 04:48:17',
                'modified' => '2023-10-24 04:48:17',
            ],
        ];
        parent::init();
    }
}
