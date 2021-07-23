<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransferHistory Controller
 *
 * @property \App\Model\Table\TransferHistoryTable $TransferHistory
 * @method \App\Model\Entity\TransferHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransferHistoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Learners', 'FromSchools', 'ToSchools'],
        ];
        $transferHistory = $this->paginate($this->TransferHistory);

        $this->set(compact('transferHistory'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfer History id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferHistory = $this->TransferHistory->get($id, [
            'contain' => ['Learners', 'FromSchools', 'ToSchools'],
        ]);

        $this->set(compact('transferHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferHistory = $this->TransferHistory->newEmptyEntity();
        if ($this->request->is('post')) {
            $transferHistory = $this->TransferHistory->patchEntity($transferHistory, $this->request->getData());
            if ($this->TransferHistory->save($transferHistory)) {
                $this->Flash->success(__('The transfer history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer history could not be saved. Please, try again.'));
        }
        $leaners = $this->TransferHistory->Learners->find('list', ['limit' => 200]);
        $fromSchools = $this->TransferHistory->FromSchools->find('list', ['limit' => 200]);
        $toSchools = $this->TransferHistory->ToSchools->find('list', ['limit' => 200]);
        $this->set(compact('transferHistory', 'leaners', 'fromSchools', 'toSchools'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferHistory = $this->TransferHistory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferHistory = $this->TransferHistory->patchEntity($transferHistory, $this->request->getData());
            if ($this->TransferHistory->save($transferHistory)) {
                $this->Flash->success(__('The transfer history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer history could not be saved. Please, try again.'));
        }
        $leaners = $this->TransferHistory->Learners->find('list', ['limit' => 200]);
        $fromSchools = $this->TransferHistory->FromSchools->find('list', ['limit' => 200]);
        $toSchools = $this->TransferHistory->ToSchools->find('list', ['limit' => 200]);
        $this->set(compact('transferHistory', 'leaners', 'fromSchools', 'toSchools'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer History id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferHistory = $this->TransferHistory->get($id);
        if ($this->TransferHistory->delete($transferHistory)) {
            $this->Flash->success(__('The transfer history has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
