<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransfersTable;
use App\Model\Entity\Transfer;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransfersTable Test Case
 */
class TransfersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transfers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transfers') ? [] : ['className' => 'App\Model\Table\TransfersTable'];
        $this->Transfers = TableRegistry::get('Transfers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transfers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Transfers->initialize(array());
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
        $validator2 = $this->Transfers->validationDefault($validator);
        $this->assertEquals($validator, $validator2);
        //$this->markTestIncomplete('Not implemented yet.');
    }
    
    public function testContain() 
    {
        $actual = $this->Transfers->find()->first();
        $expected = new Transfer([
            'TransferId'   => 1,
            'OldLocId'     => 1,
            'OldItemId'    => 1,
            'OldItemRecId' => 1,
            'NewLocId'     => 1,
            'NewItemId'    => 2,
            'NewItemRecId' => 2,
            'IsConfirmed'  => FALSE,
            'TransferDate' => new \Cake\I18n\Time('2015-09-20T12:45:38+0000'),
            'ConfirmDate'  => new \Cake\I18n\Time('2015-09-20T12:45:38+0000'),
            'IsCancelled'  => FALSE,
            'TransferType' => 'Lo',
            'UserId'       => 'Lorem ipsum dolor sit amet',
        ]);
        $this->assertEquals($expected->toArray(), $actual->toArray());
    }
}
