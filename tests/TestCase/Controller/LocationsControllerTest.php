<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LocationsController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LocationsController Test Case
 */
class LocationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.locations'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $result = $this->get('/locations');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $result = $this->get('/locations/view/1');
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
                ['controller' => 'locations',
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
                ['controller' => 'locations',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'LocName' => 'test item',
                'LocNote' => 'test note',
                'DateCreated' => date('Y-m-d'),
                'AllowDecimals' => false,
                'MaxCapacity' => 7,
                'Viewable' => TRUE,
                'ReviewFreqString' => 'test keywords',
                'TimeStamp' => date('c'),
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/locations';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }

    /**
     * Test add method
     *
     * @return void
     */
    //public function testAddWithPostError()
    //{
    //    $this->configRequest([
    //        'headers' => ['Accept' => 'application/json']
    //    ]);
    //    $this->post(
    //        Router::url(
    //            ['controller' => 'locations',
    //                'action' => 'add',
    //                //'_ext' => 'json'
    //            ]
    //        ),
    //        [
    //            'LocNameWrong' => 'test item',
    //            'wrongLocNote' => 'test note',
    //            'DateCreated' => '',
    //            'AllowDecimals' => false,
    //            'MaxCapacity' => 7,
    //            'Viewable' => TRUE,
    //            'ReviewFreqString' => 'test keywords',
    //            'TimeStamp' => date('c'),
    //        ]
    //    );
    //    $this->assertResponseCode(302);
    //    //$this->assertResponseOk();
    //    $expected = [
    //        'response' => ['result' => 'success'],
    //    ];
    //    //$expected = json_encode($expected, JSON_PRETTY_PRINT);
    //    $expected = array('/locations');
    //    $this->assertEquals($expected, $this->_response->header());
    //}


    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->get(
            Router::url('/locations/edit/1')
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
            Router::url('locations/edit/1'),
            [
                'LocName' => 'test item',
                'LocNote' => 'test note',
                'DateCreated' => date('Y-m-d'),
                'AllowDecimals' => false,
                'MaxCapacity' => 7,
                'Viewable' => TRUE,
                'ReviewFreqString' => 'test keywords',
                'TimeStamp' => date('c'),
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/locations';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }


    /**
     * Test edit method
     *
     * @return void
     */
    /*public function testEditWithPostError() {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
                Router::url('locations/edit/1'), [
            'WrongLocName' => 'test item',
            'LocNote' => 'test note',
            'DateCreated' => date('Y-m-d'),
            'AllowDecimals' => false,
            'MaxCapacity' => 7,
            'Viewable' => TRUE,
            'ReviewFreqString' => 'test keywords',
            'TimeStamp' => date('c'),
                ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/locations';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }*/

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
            Router::url('/locations/delete/1')
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/locations'
        );
        $this->assertEquals($expected, $this->_response->header());
    }
}
