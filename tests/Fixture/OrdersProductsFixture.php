<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersProductsFixture
 */
class OrdersProductsFixture extends TestFixture
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
                'product_id' => 1,
                'order_id' => 1,
                'qty' => 1,
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
