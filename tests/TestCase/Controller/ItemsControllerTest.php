<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ItemsController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ItemsController Test Case
 */
class ItemsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.items',
        'app.locations',
        'app.categories',
        'app.transfers',
        'app.statuses',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $result = $this->get('/items');
        $this->assertResponseOk();
   }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $result = $this->get('/items/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->get(
            Router::url(
                ['controller' => 'items',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            )
        );
        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array('Content-Type' => 'text/html; charset=UTF-8');
        $this->assertEquals($expected, $this->_response->header());
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddWithPost()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url(
                ['controller' => 'items',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'NumItemId' => 7,
                'TextItemId' => '7',
                'LocId' => 15,
                'ItemName' => 'test item',
                'Keywords' => 'test keywords',
                'CatId' => 1,
                'ActionDate' => date('Y-m-d'),
                'DateCreated' => date('Y-m-d'),
                'ReviewFreq' => 360,
                'ItemNote' => 'test note',
                'IsTagged' => false,
                'Status' => 0,
                'TimeStamp' => date('c'),
                'ItemNotes' => 'test notes'
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/items';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }

 
    /**
     * Test add method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->get(
            Router::url('/items/edit/1')
        );
        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array('Content-Type' => 'text/html; charset=UTF-8');
        $this->assertEquals($expected, $this->_response->header());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditWithPost()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url('items/edit/1'),
            [
                'NumItemId' => 7,
                'TextItemId' => '7',
                'LocId' => 15,
                'ItemName' => 'test item',
                'Keywords' => 'test keywords',
                'CatId' => 1,
                'ActionDate' => date('Y-m-d'),
                'DateCreated' => date('Y-m-d'),
                'ReviewFreq' => 360,
                'ItemNote' => 'test note',
                'IsTagged' => false,
                'Status' => 0,
                'TimeStamp' => date('c'),
                'ItemNotes' => 'test notes'
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/items';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }

 
    /**
     * Test move method
     *
     * @return void
     */
    public function testMove()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->get(
            Router::url('/items/move/1')
        );
        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array('Content-Type' => 'text/html; charset=UTF-8');
        $this->assertEquals($expected, $this->_response->header());
    }

 
    /**
     * Test move method
     *
     * @return void
     */
    public function testMoveWithPost()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url('items/move/1'),
            [
                'LocId' => 15,
            ]
        );
        $this->assertResponseCode(200);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array('Content-Type' => 'text/html; charset=UTF-8');
        $this->assertEquals($expected, $this->_response->header());
    }

 
    /**
     * Test move method
     *
     * @return void
     */
    public function testMoveWithPostAvailable()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url('items/move/1'),
            [
                'LocId' => 1,
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
            'Location' => '/items/view/2',
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/items/view/3'
        );
        $this->assertEquals($expected, $this->_response->header());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
       $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url('/items/delete/1')
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/items'
        );
        $this->assertEquals($expected, $this->_response->header());
     }

    private $expectedItem0 = array(
        'Item' => array(
            'RecordId' => '1',
            'NumItemId' => '1',
            'TextItemId' => 'Lorem ipsum dolor sit amet',
            'LocId' => '1',
            'ItemName' => 'Lorem ipsum dolor sit amet',
            'Keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla ves
tibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'CatId' => '1',
            'ActionDate' => '0000-00-00 00:00:00',
            'DateCreated' => '0000-00-00 00:00:00',
            'ReviewFreq' => '1',
            'ItemNote' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla ves
tibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'IsTagged' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla ves
tibulum massa neque ut et, id hendrerit sit,',
            'Status' => '1',
            'TimeStamp' => '0000-00-00 00:00:00',
            'ItemNotes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla ve
stibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
        ),
        'Location' => array(
            'LocId' => '1',
            'LocName' => 'Lorem ipsum dolor sit amet',
            'LocNote' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vest
ibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'DateCreated' => '0000-00-00 00:00:00',
            'AllowDecimals' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Null
a vestibulum massa neque ut et, id hendrerit sit,',
            'MaxCapacity' => '1',
            'Viewable' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla ves
tibulum massa neque ut et, id hendrerit sit,',
            'ReviewFreqString' => 'Lorem ipsum dolor sit amet',
            'Timestamp' => '0000-00-00 00:00:00',
        ),
        'Category' => array(
            'CatId' => '1',
            'CatName' => 'Document',
            'Catnote' => 'Document Note',
            'Viewable' => 'Document Viewable',
            'TimeStamp' => '0000-00-00 00:00:00',
        ),
    );

    
    
}
