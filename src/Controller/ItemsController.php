<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{
    const OPEN           = 0;
    const OCCUPIED       = 1;
    const MOVEOUTPENDING = 2;
    const MOVEINPENDING  = 3;

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('items', $this->paginate($this->Items->find()->contain(['Locations', 'Categories', 'Statuses'])));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|NULL $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = NULL)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Locations', 'Categories']
        ]);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                // @codeCoverageIgnoreStart
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
                // @codeCoverageIgnoreEnd
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|NULL $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = NULL)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Locations', 'Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                // @codeCoverageIgnoreStart
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
                // @codeCoverageIgnoreEnd
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Move method
     *
     * @param string|NULL $id Item id.
     * @return void Redirects on successful move, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function move($id = NULL)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Locations', 'Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$destination = $this->Items->find()->where(['LocId' => $this->request->data['LocId']])->andWhere(['status' => 0])->first();
            if (isset($this->request->data['LocId'])) {
                $destination = $this->Items->find()->where(['Status' => $this->OPEN, 'ItemName' => '(Open)', 'LocId' => $this->request->data['LocId']])->first();
                if (!is_null($destination)) {
                    $transfer = new \App\Model\Entity\Transfer(
                        [
                            'OldLocId' => $item->LocId,
                            'OldItemId' => $item->NumItemId,
                            'OldItemRecId' => $item->RecordId,
                            'NewLocId' => $destination->LocId,
                            'NewItemId' => $destination->NumItemId,
                            'NewItemRecId' => $destination->RecordId,
                            'IsConfirmed' => FALSE,
                            'TransferDate' => Time::now(),
                            'ConfirmDate' => NULL,
                            'IsCancelled' => FALSE,
                            'TransferType' => 'M',
                        ]
                    );
                    TableRegistry::get('Transfers')->save($transfer);
                    $destination->ItemName   = $item->ItemName;
                    $destination->Keywords   = $item->Keywords;
                    $destination->CatId      = $item->CatId;
                    $destination->ItemNote   = $item->ItemNote;
                    $destination->ActionDate = new Time('1 month');
                    $destination->Status     = 3; //$this->MOVEINPENDNG;
                    $this->Items->save($destination);
                    $item->Status = 2; //$this->MOVEOUTPENDING;
                    $this->Items->save($item);
                    return $this->redirect(['action' => 'view/' . $destination->RecordId]);
                }
                $this->Flash->error(__(var_export($destination, TRUE)));
            }
            //$item = $this->Items->patchEntity($item, $this->request->data);
            //if ($this->Items->save($item)) {
            //    $this->Flash->success(__('The item has been saved.'));
            //    return $this->redirect(['action' => 'index']);
            //} else {
                //$this->Flash->error(__(var_export($this->request->data, true)));
                //$this->Flash->error(__('The item could not be saved. Please, try again.'));
            //}
        }
        $this->set(compact('item'));
        $this->set('locations', TableRegistry::get('Locations')->find('list')->orderAsc('LocName'));
        $this->set('_serialize', ['item', 'locations']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = NULL)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            // @codeCoverageIgnoreStart
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
            // @codeCoverageIgnoreEnd
        }
        return $this->redirect(['action' => 'index']);
    }
}
