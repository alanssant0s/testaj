<?php

declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Traits\CurrentUserTrait;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObjectivesCasos Model
 *
 * @property \App\Model\Table\ObjectivesTable&\Cake\ORM\Association\BelongsTo $Objectives
 * @property \App\Model\Table\CasosTable&\Cake\ORM\Association\BelongsTo $Casos
 *
 * @method \App\Model\Entity\ObjectiveCaso newEmptyEntity()
 * @method \App\Model\Entity\ObjectiveCaso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ObjectiveCaso get($primaryKey, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ObjectiveCaso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ObjectiveCaso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ObjectivesCasosTable extends Table
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

        $this->setTable('objectives_casos');
        $this->setDisplayField(['objective_id', 'caso_id']);
        $this->setPrimaryKey(['objective_id', 'caso_id']);

        $this->belongsTo('Objectives', [
            'foreignKey' => 'objective_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Casos', [
            'foreignKey' => 'caso_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn('objective_id', 'Objectives'), ['errorField' => 'objective_id']);
        $rules->add($rules->existsIn('caso_id', 'Casos'), ['errorField' => 'caso_id']);

        return $rules;
    }
}
