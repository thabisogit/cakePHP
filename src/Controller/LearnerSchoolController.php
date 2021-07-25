<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * LearnerSchool Controller
 *
 * @property \App\Model\Table\LearnerSchoolTable $LearnerSchool
 * @method \App\Model\Entity\LearnerSchool[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LearnerSchoolController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Learners', 'Schools'],
        ];
        $learnerSchool = $this->paginate($this->LearnerSchool);

        $this->set(compact('learnerSchool'));
    }

    /**
     * View method
     *
     * @param string|null $id Learner School id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $learnerSchool = $this->LearnerSchool->get($id, [
            'contain' => ['Learners', 'Schools'],
        ]);

        $this->set(compact('learnerSchool'));
    }


    public function add()
    {
        if($this->request->is('post')){
            $learner_id = $this->request->getData('learner_id');
            $school_id = $this->request->getData('school_id');
            $learnerSchool_table = TableRegistry::getTableLocator()->get('LearnerSchool');
            $records = $learnerSchool_table->newEntity(['learner_id'=>$learner_id,'school_id'=>$school_id]);
            if($learnerSchool_table->save($records))
                dd(123456);
                echo "User is added.";
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Learner School id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $learnerSchool = $this->LearnerSchool->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $learnerSchool = $this->LearnerSchool->patchEntity($learnerSchool, $this->request->getData());
            if ($this->LearnerSchool->save($learnerSchool)) {
                $this->Flash->success(__('The learner school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learner school could not be saved. Please, try again.'));
        }
        $leaners = $this->LearnerSchool->Learners->find('list', ['limit' => 200]);
        $schools = $this->LearnerSchool->Schools->find('list', ['limit' => 200]);
        $this->set(compact('learnerSchool', 'leaners', 'schools'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Learner School id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $learnerSchool = $this->LearnerSchool->get($id);
        if ($this->LearnerSchool->delete($learnerSchool)) {
            $this->Flash->success(__('The learner school has been deleted.'));
        } else {
            $this->Flash->error(__('The learner school could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function saveData()
    {
        if($this->request->is('post')){

            $learner_id = $this->request->getData('learner_id');
            $school_id = $this->request->getData('school_id');
            $current_school_id = $this->request->getData('current_school');

            $connection = ConnectionManager::get('default');
            $connection->insert('learner_school', [
                'leaner_id' => $learner_id,
                'school_id' => $school_id
            ]);

            $connection->insert('transfer_history', [
                'from_school_id' => $current_school_id,
                'to_school_id' => $school_id,
                'leaner_id' => $learner_id
            ]);

            return $this->redirect( Router::url( $this->referer(), true ) );
        }
    }


    /**
     * Edit method
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public  function getLearnerHistory()
    {
        $history =[];
        $records = $this->getTableLocator()->get('TransferHistory');
        $query1 = $records
            ->find()
            ->select(['from_school_id', 'to_school_id'])
            ->where(['leaner_id =' => $this->request->getData('learner_id')])
            ->all();

        foreach ($query1 as $rec) {
            $from = $this->getSchool($rec->from_school_id);
            $to = $this->getSchool($rec->to_school_id);
            $history[]='From '.$from.' to ' . $to;
        }

        $this->set(['history'=>$history]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }


    public function getSchool($school_id){
        $schools = $this->getTableLocator()->get('Schools');
        $school = $schools
            ->find()
            ->where(['id' => $school_id])
            ->first();

        return $school->school_name;
    }
}
