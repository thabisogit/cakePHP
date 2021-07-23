<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LearnerSchool Model
 *
 * @property \App\Model\Table\LeanersTable&\Cake\ORM\Association\BelongsTo $Leaners
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsTo $Schools
 *
 * @method \App\Model\Entity\LearnerSchool newEmptyEntity()
 * @method \App\Model\Entity\LearnerSchool newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LearnerSchool[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LearnerSchool get($primaryKey, $options = [])
 * @method \App\Model\Entity\LearnerSchool findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LearnerSchool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LearnerSchool[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LearnerSchool|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LearnerSchool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LearnerSchool[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LearnerSchool[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LearnerSchool[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LearnerSchool[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LearnerSchoolTable extends Table
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

        $this->setTable('learner_school');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Learners', [
            'foreignKey' => 'leaner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER',
        ]);
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['leaner_id'], 'Learners'), ['errorField' => 'leaner_id']);
        $rules->add($rules->existsIn(['school_id'], 'Schools'), ['errorField' => 'school_id']);

        return $rules;
    }
}
