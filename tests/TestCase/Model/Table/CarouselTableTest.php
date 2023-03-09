<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarouselTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarouselTable Test Case
 */
class CarouselTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarouselTable
     */
    protected $Carousel;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Carousel',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Carousel') ? [] : ['className' => CarouselTable::class];
        $this->Carousel = $this->getTableLocator()->get('Carousel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Carousel);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarouselTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
