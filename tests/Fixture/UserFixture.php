<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserFixture
 */
class UserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user';
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
                'user_name' => 'Lorem ipsum d',
                'password' => 'Lorem ipsum dolor ',
                'role' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor ',
                'street_address' => 'Lorem ipsum dolor sit amet',
                'post_code' => 'Lo',
                'state' => 'L',
                'phone_number' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
