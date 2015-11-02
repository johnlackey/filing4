<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StatusesController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StatusesController Test Case
 */
class StatusesControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $result = $this->get('/statuses');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $result = $this->get('/statuses/view/1');
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
                ['controller' => 'statuses',
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
                ['controller' => 'statuses',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'name' => 'test status',
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/statuses';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddWithPostError()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url(
                ['controller' => 'statuses',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'nameWrong' => 'test status',
            ]
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
    public function testEdit()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->get(
            Router::url('/statuses/edit/1')
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
            Router::url('statuses/edit/1'),
            [
                'name' => 'test item',
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/statuses';
        $this->assertEquals($expected, $this->_response->header()['Location']);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $statusesTable = \Cake\ORM\TableRegistry::get('Statuses');
        $status = new \App\Model\Entity\Status();
        $status->name = "Added status";
        $statusesTable->save($status);
        $id = $status->id;
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post(
            Router::url('/statuses/delete/' . $id)
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/statuses'
        );
        $this->assertEquals($expected, $this->_response->header());
    }
}
