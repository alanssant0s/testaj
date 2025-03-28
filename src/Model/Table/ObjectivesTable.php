<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Objectives Model
 *
 * @property \App\Model\Table\ObjectivesCasosTable&\Cake\ORM\Association\HasMany $ObjectivesCasos
 * @property \App\Model\Table\NaturesTable&\Cake\ORM\Association\BelongsTo $Natures
 * 
 * @method \App\Model\Entity\Objective newEmptyEntity()
 * @method \App\Model\Entity\Objective newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Objective[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Objective get($primaryKey, $options = [])
 * @method \App\Model\Entity\Objective findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Objective patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Objective[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Objective|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Objective saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Objective[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Objective[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Objective[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Objective[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObjectivesTable extends Table
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

        $this->setTable('objectives');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ObjectivesCasos', [
            'foreignKey' => 'objective_id',
        ]);

        $this->belongsTo('Natures', [
            'foreignKey' => 'nature_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn(['nature_id'], 'Natures'), ['errorField' => 'nature_id']);

        return $rules;
    }
}
