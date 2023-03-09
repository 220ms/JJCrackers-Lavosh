<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarouselFixture
 */
class CarouselFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'carousel';
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
                'photo' => 'Lorem ipsum dolor sit amet',
                'heading' => 'Lorem ipsum dolor ',
                'description' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
