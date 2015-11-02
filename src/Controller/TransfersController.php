<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Transfers Controller
 *
 * @property \App\Model\Table\TransfersTable $Transfers
 */
class TransfersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('transfers', $this->paginate($this->Transfers->find()->where(['IsConfirmed' => '0'])->where(['IsCancelled' => '0'])->contain(['OldLocations', 'NewLocations', 'Items'])));
        $this->set('_serialize', ['transfers']);
    }

    /**
     * Confirm method
     *
     * @param string|NULL $id Transfer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function confirm($id = NULL)
    {
        $transfer = $this->Transfers->get(
                $id,
                ['contain' => ['Items', 'NewItems']]
        );
        if (is_null($transfer->item)) {
            $transfer->item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        }
        if (is_null($transfer->newItem)) {
            $transfer->newItem = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        }
        if (is_null($transfer->item) || is_null($transfer->newItem)) {
            throw new \Exception("item is NULL");
        }
        $item                  = $transfer->item;
        $newItem               = $transfer->newItem;
        $item->Status          = 0;
        $item->ItemName        = "(open)";
        $newItem->Status       = 1;
        $transfer->IsConfirmed = '1';
        $this->Transfers->save($transfer);
        TableRegistry::get('Items')->save($item);
        TableRegistry::get('Items')->save($newItem);
        return $this->redirect(['action' => 'index']);
        //$this->set('transfer', $transfer);
        //$this->set('_serialize', ['transfer']);
    }

    /**
     * Cancel method
     *
     * @param string|NULL $id Transfer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function cancel($id = NULL)
    {
        $transfer = $this->Transfers->get(
                $id,
                ['contain' => ['Items', 'NewItems']]
        );
        if (is_null($transfer->item)) {
            $transfer->item = TableRegistry::get('Items')->get($transfer->OldItemRecId);
        }
        if (is_null($transfer->newItem)) {
            $transfer->newItem = TableRegistry::get('Items')->get($transfer->NewItemRecId);
        }
        if (is_null($transfer->item) || is_null($transfer->newItem)) {
            throw new \Exception("item is NULL");
        }
        $transfer->item->Status      = 1;
        $transfer->newItem->ItemName = "(open)";
        $transfer->newItem->Status   = 0;
        $transfer->IsCancelled       = TRUE;
        if ($this->Transfers->save($transfer)) {
            if (TableRegistry::get('Items')->save($transfer->item)) {
                if (TableRegistry::get('Items')->save($transfer->newItem)) {
                    $this->Flash->success(__('The transfer has been canceled.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The transfer could not be canceled. New item failed to save.'));
                }
            } else {
                $this->Flash->error(__('The transfer could not be canceled. Old item failed to save.'));
            }
        } else {
            $this->Flash->error(__('The transfer could not be canceled. Please, try again.'));
        }
        //$itemsTable->save($item);
        //$itemsTable   = TableRegistry::get('Items');
        //$item         = $itemsTable->get($transfer->OldItemRecId);
        //$item->Status = 1;
        //$itemsTable->save($item);
        //$newItem              = $transfer->newItem;
        //$newItem->ItemName    = "(open)";
        //$newItem->Status      = 0;
        //$transfer->IsCanceled = TRUE;
        //$this->Transfers->save($transfer);
        //$itemsTable->save($newItem);
        //$this->set('transfer', $transfer);
        //$this->set('_serialize', ['transfer']);
    }

    /**
     * View method
     *
     * @param string|NULL $id Transfer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = NULL)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => ['OldLocations', 'NewLocations']
        ]);
        $this->set('transfer', $transfer);
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transfer = $this->Transfers->newEntity();
        if ($this->request->is('post')) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->data);
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transfer'));
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Edit method
     *
     * @param string|NULL $id Transfer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = NULL)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->data);
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transfer'));
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Delete method
     *
     * @param string|NULL $id Transfer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = NULL)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transfer = $this->Transfers->get($id);
        if ($this->Transfers->delete($transfer)) {
            $this->Flash->success(__('The transfer has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
