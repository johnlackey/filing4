<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TransfersController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TransfersController Test Case
 */
class TransfersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transfers',
        'app.locations',
        'app.items'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $result = $this->get('/transfers');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $result = $this->get('/transfers/view/1');
        $this->assertResponseOk();
    }


    /**
     * Test confirm method
     *
     * @return void
     */
    public function testConfirm()
    {
        $transfer = TableRegistry::get('Transfers')->get(1);
        $this->assertFalse($transfer->IsCancelled);
        $item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        $this->assertEquals(2, $item->Status);
        $item = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        $this->assertEquals(3, $item->Status);
        $this->assertEquals('Lorem ipsum dolor sit amet', $item->ItemName);
        $result = $this->get('/transfers/confirm/1');
        $this->assertResponseCode(302);
        $transfer = TableRegistry::get('Transfers')->get(1);
        $this->assertTrue($transfer->IsConfirmed);
        $this->assertFalse($transfer->IsCancelled);
        $item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        $this->assertEquals(0, $item->Status);
        $this->assertEquals('(open)', $item->ItemName);
        $item = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        $this->assertEquals(1, $item->Status);
        $this->assertEquals('Lorem ipsum dolor sit amet', $item->ItemName);
    }

    /**
     * Test cancel method
     *
     * @return void
     */
    public function testCancel()
    {
        $transfer = TableRegistry::get('Transfers')->get(1);
        $this->assertFalse($transfer->IsCancelled);
        $item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        $this->assertEquals(2, $item->Status);
        $item = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        $this->assertEquals(3, $item->Status);
        $this->assertEquals('Lorem ipsum dolor sit amet', $item->ItemName);
        $result = $this->get('/transfers/cancel/1');
        $this->assertResponseCode(302);
        $transfer = TableRegistry::get('Transfers')->get(1);
        $this->assertFalse($transfer->IsConfirmed);
        $this->assertTrue($transfer->IsCancelled);
        $item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        $this->assertEquals(1, $item->Status);
        $this->assertEquals('Lorem ipsum dolor sit amet', $item->ItemName);
        $item = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        $this->assertEquals(0, $item->Status);
        $this->assertEquals('(open)', $item->ItemName);
        //$this->assertEquals(array(), $transfer->toArray());
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
                ['controller' => 'transfers',
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
                ['controller' => 'transfers',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'OldLocId' => 1,
                'OldItemId' => 7,
                'OldItemRecId' => 15,
                'NewLocId' => 1,
                'NewItemId' => 7,
                'NewItemRecId' => 15,
                'IsConfirmed' => FALSE,
                'TransferDate' => date('Y-m-d'),
                'ConfirmDate' => date('Y-m-d'),
                'IsCancelled' => FALSE,
                'TransferType' => 'M',
                'UserId' => '360',
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/transfers';
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
                ['controller' => 'transfers',
                    'action' => 'add',
                    //'_ext' => 'json'
                ]
            ),
            [
                'OldLocIdError' => 1,
                'OldItemId' => 7,
                'OldItemRecId' => 15,
                'NewLocId' => 1,
                'NewItemId' => 7,
                'NewItemRecId' => 15,
                'IsConfirmed' => FALSE,
                'TransferDate' => date('Y-m-d'),
                'ConfirmDate' => date('Y-m-d'),
                'IsCancelled' => FALSE,
                'TransferType' => 'M',
                'UserId' => '360',
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
            Router::url('/transfers/edit/1')
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
            Router::url('transfers/edit/1'),
            [
                'OldLocId' => 1,
                'OldItemId' => 7,
                'OldItemRecId' => 15,
                'NewLocId' => 1,
                'NewItemId' => 7,
                'NewItemRecId' => 15,
                'IsConfirmed' => FALSE,
                'TransferDate' => date('Y-m-d'),
                'ConfirmDate' => date('Y-m-d'),
                'IsCancelled' => FALSE,
                'TransferType' => 'M',
                'UserId' => '360',
            ]
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = '/transfers';
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
            Router::url('/transfers/delete/1')
        );
        $this->assertResponseCode(302);
        $expected = [
            'response' => ['result' => 'success'],
        ];
        //$expected = json_encode($expected, JSON_PRETTY_PRINT);
        $expected = array(
            'Content-Type' => 'text/html; charset=UTF-8',
            'Location' => '/transfers'
        );
        $this->assertEquals($expected, $this->_response->header());
    }
}
