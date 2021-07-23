<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchoolsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provinces'],
        ];
        $schools = $this->paginate($this->Schools);

        $this->set(compact('schools','provinces'));
    }

    /**
     * View method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => ['Provinces', 'LearnerSchool'],
        ]);

        $provinces = $this->Schools->Provinces->find()->select(['province_name'])->where(['id =' => $school->province_id])->all();
        $province ='';
        foreach($provinces as $prov){
            $province=$prov->province_name;
        }

        $learnersArray = [];
        $learners = [];
        foreach($school->learner_school as $learner){
            $learnersArray[]=$learner->leaner_id;
        }
        foreach(array_unique($learnersArray) as $lnr){
            $learners[] = $this->getLearner($lnr);
        }

        $this->set(compact('school','province','learners'));
    }

    function getLearner($learner_id){
            $learners = $this->getTableLocator()->get('Learners');
            $learner = $learners
                ->find()
                ->select(['id','first_name'])
                ->where(['id' => $learner_id])
                ->first();

            return $learner;

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $school = $this->Schools->newEmptyEntity();
        if ($this->request->is('post')) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }

        $provinces = $this->Schools->Provinces->find()->select(['id', 'province_name'])->all();
        $this->set(compact('school', 'provinces'));
    }

    /**
     * Edit method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $provinces = $this->Schools->Provinces->find()->select(['id', 'province_name'])->all();
        $this->set(compact('school', 'provinces'));
    }

    /**
     * Delete method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
            $this->Flash->success(__('The school has been deleted.'));
        } else {
            $this->Flash->error(__('The school could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Edit method
     * @param string|null $learner_id School id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getLearnerSchool(){
        $learner_id = $this->request->getData('learner_id');
        $connection = ConnectionManager::get('default');

        $results = $connection
            ->execute('SELECT * FROM learner_school WHERE leaner_id = :id', ['id' => $learner_id])
            ->fetchAll('assoc');

        $currentSchool = $connection
            ->execute('SELECT school_name FROM schools WHERE id = :id ', ['id' => $results[count($results)-1]['school_id']])
            ->fetchAll('assoc');
//dd($currentSchool);
        $this->set(['current_school' => $currentSchool[0]['school_name']]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
