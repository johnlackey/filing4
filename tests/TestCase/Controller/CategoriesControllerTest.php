<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CategoriesController Test Case
 */
class CategoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $result = $this->get('/categories');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $result = $this->get('/categories/view/1');
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
                ['controller' => 'categories',
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
                ['controller' => 'categories',
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
    public function testAddWithPostData()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url(
                ['controller' => 'categories',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'CatName' => 'Test Category',
                'Catnote' => 'Test note',
                'Viewable' => TRUE,
                'TimeStamp' => date('c'),
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/categories'
        );
        $this->assertEquals($expected, $this->_response->header());
    }

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
            Router::url('/categories/edit/1')
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
            Router::url('categories/edit/1'),
            [
                'CatName' => 'Test Category',
                'Catnote' => 'Test note',
                'Viewable' => TRUE,
                'TimeStamp' => date('c'),
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/categories';
        $this->assertEquals($expected, $this->_response->header()['Location']);
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
            Router::url('/categories/delete/1')
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/categories'
        );
        $this->assertEquals($expected, $this->_response->header());
    }
}
