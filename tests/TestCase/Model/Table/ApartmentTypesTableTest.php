<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApartmentTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApartmentTypesTable Test Case
 */
class ApartmentTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApartmentTypesTable
     */
    protected $ApartmentTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ApartmentTypes',
        'app.Statuses',
        'app.Apartments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ApartmentTypes') ? [] : ['className' => ApartmentTypesTable::class];
        $this->ApartmentTypes = $this->getTableLocator()->get('ApartmentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ApartmentTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ApartmentTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ApartmentTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
