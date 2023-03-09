<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'price' => 1.5,
                'created' => '2022-09-04 08:22:33',
                'status' => 'Lorem ip',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
