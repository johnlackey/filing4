<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusesTable Test Case
 */
class StatusesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Statuses') ? [] : ['className' => 'App\Model\Table\StatusesTable'];
        $this->Statuses = TableRegistry::get('Statuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Statuses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Statuses->initialize(array());
        $this->assertTrue(true);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new \Cake\Validation\Validator();
        $validator2 = $this->Statuses->validationDefault($validator);
        $this->assertEquals($validator, $validator2);
    }
}
