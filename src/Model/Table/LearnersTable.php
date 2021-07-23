<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Learners Model
 *
 * @method \App\Model\Entity\Learner newEmptyEntity()
 * @method \App\Model\Entity\Learner newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Learner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Learner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Learner findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Learner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Learner[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Learner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LearnersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('learners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('id_number')
            ->maxLength('id_number', 255)
            ->requirePresence('id_number', 'create')
            ->notEmptyString('id_number');

        $validator
            ->date('dob')
            ->allowEmptyDate('dob');

        $validator
            ->scalar('home_address')
            ->maxLength('home_address', 255)
            ->requirePresence('home_address', 'create')
            ->notEmptyString('home_address');

        $validator
            ->scalar('contact_number')
            ->maxLength('contact_number', 255)
            ->requirePresence('contact_number', 'create')
            ->notEmptyString('contact_number');

        return $validator;
    }
}
