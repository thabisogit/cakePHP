<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransferHistory Model
 *
 * @property \App\Model\Table\LeanersTable&\Cake\ORM\Association\BelongsTo $Leaners
 * @property \App\Model\Table\FromSchoolsTable&\Cake\ORM\Association\BelongsTo $FromSchools
 * @property \App\Model\Table\ToSchoolsTable&\Cake\ORM\Association\BelongsTo $ToSchools
 *
 * @method \App\Model\Entity\TransferHistory newEmptyEntity()
 * @method \App\Model\Entity\TransferHistory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TransferHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransferHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransferHistory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TransferHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransferHistory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransferHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferHistory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferHistory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferHistory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferHistory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransferHistoryTable extends Table
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

        $this->setTable('transfer_history');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Learners', [
            'foreignKey' => 'leaner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('FromSchools', [
            'foreignKey' => 'from_school_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ToSchools', [
            'foreignKey' => 'to_school_id',
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
        $rules->add($rules->existsIn(['from_school_id'], 'FromSchools'), ['errorField' => 'from_school_id']);
        $rules->add($rules->existsIn(['to_school_id'], 'ToSchools'), ['errorField' => 'to_school_id']);

        return $rules;
    }
}
