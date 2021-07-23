<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\School;

/**
 * Learners Controller
 *
 * @property \App\Model\Table\LearnersTable $Learners
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LearnersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $learners = $this->paginate($this->Learners);

        $this->set(compact('learners'));
    }

    /**
     * View method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $learner = $this->Learners->get($id, [
            'contain' => [],
        ]);

        $schools = $this->getTableLocator()->get('Schools')->find();
        $this->set(compact('learner','schools'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $learner = $this->Learners->newEmptyEntity();
        if ($this->request->is('post')) {
            $learner = $this->Learners->patchEntity($learner, $this->request->getData());
            if ($this->Learners->save($learner)) {
                $this->Flash->success(__('The learner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learner could not be saved. Please, try again.'));
        }
        $this->set(compact('learner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $learner = $this->Learners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $learner = $this->Learners->patchEntity($learner, $this->request->getData());
            if ($this->Learners->save($learner)) {
                $this->Flash->success(__('The learner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learner could not be saved. Please, try again.'));
        }
        $this->set(compact('learner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $learner = $this->Learners->get($id);
        if ($this->Learners->delete($learner)) {
            $this->Flash->success(__('The learner has been deleted.'));
        } else {
            $this->Flash->error(__('The learner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
