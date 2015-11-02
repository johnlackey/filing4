<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsTable;
use App\Model\Entity\Item;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsTable Test Case
 */
class ItemsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Items') ? [] : ['className' => 'App\Model\Table\ItemsTable'];
        $this->Items = TableRegistry::get('Items', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Items);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Items->initialize(array());
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
        $validator2 = $this->Items->validationDefault($validator);
        $this->assertEquals($validator, $validator2);
        //$this->markTestIncomplete('Not implemented yet.');
    }
    
    public function testContain() 
    {
        $actual = $this->Items->find()->contain(['Locations'])->first();
        $expected = new Item([
            'RecordId' => 1,
            'NumItemId' => 1,
            'TextItemId' => 'Lorem ipsum dolor sit amet',
            'LocId' => 1,
            'ItemName' => 'Lorem ipsum dolor sit amet',
            'Keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'CatId' => 1,
            'ActionDate' => new \Cake\I18n\Time('2015-08-29T18:17:22+0000'),
            'DateCreated' => new \Cake\I18n\Time('2015-08-29T18:17:22+0000'),
            'ReviewFreq' => 1,
            'ItemNote' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'IsTagged' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'Status' => 2,
            'TimeStamp' => new \Cake\I18n\Time('2015-08-29T18:17:22+0000'),
            'ItemNotes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'location' => NULL,
        ]);
        $this->assertEquals($expected->toArray(), $actual->toArray());
    }
}
