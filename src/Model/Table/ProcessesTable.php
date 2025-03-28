<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Processes Model
 *
 * @property \App\Model\Table\NaturesTable&\Cake\ORM\Association\BelongsTo $Natures
 * @property \App\Model\Table\ObjectivesTable&\Cake\ORM\Association\BelongsTo $Objectives
 * @property \App\Model\Table\CasosTable&\Cake\ORM\Association\BelongsTo $Casos
 * @property \App\Model\Table\AirlineCompaniesTable&\Cake\ORM\Association\BelongsTo $AirlineCompanies
 * @property \App\Model\Table\DistrictsTable&\Cake\ORM\Association\BelongsTo $Districts
 * @property \App\Model\Table\ResultsTable&\Cake\ORM\Association\BelongsTo $Results
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\BelongsTo $Requests
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\JudgesTable&\Cake\ORM\Association\BelongsTo $Judges
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ImportsTable&\Cake\ORM\Association\BelongsTo $Imports
 *
 * @method \App\Model\Entity\Process newEmptyEntity()
 * @method \App\Model\Entity\Process newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Process[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Process get($primaryKey, $options = [])
 * @method \App\Model\Entity\Process findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Process patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Process[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Process|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Process saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcessesTable extends Table
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

        $this->setTable('processes');
        $this->setDisplayField('process_number');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Natures', [
            'foreignKey' => 'nature_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Objectives', [
            'foreignKey' => 'object_id',
        ]);
        $this->belongsTo('Casos', [
            'foreignKey' => 'caso_id',
        ]);
        $this->belongsTo('AirlineCompanies', [
            'foreignKey' => 'airline_company_id',
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
        ]);
        $this->belongsTo('Results', [
            'foreignKey' => 'result_id',
        ]);
        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
        ]);
        $this->belongsTo('Judges', [
            'foreignKey' => 'judge_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Imports', [
            'foreignKey' => 'import_id',
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
            ->scalar('process_number')
            ->allowEmptyString('process_number');

        $validator
            ->integer('nature_id')
            ->notEmptyString('nature_id');

        $validator
            ->integer('object_id')
            ->allowEmptyString('object_id');

        $validator
            ->integer('caso_id')
            ->allowEmptyString('caso_id');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('jurisprudence')
            ->allowEmptyString('jurisprudence');

        $validator
            ->integer('airline_company_id')
            ->allowEmptyString('airline_company_id');

        $validator
            ->integer('district_id')
            ->allowEmptyString('district_id');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->integer('result_id')
            ->allowEmptyString('result_id');

        $validator
            ->integer('request_id')
            ->allowEmptyString('request_id');

        $validator
            ->integer('type_id')
            ->allowEmptyString('type_id');

        $validator
            ->decimal('value_requests')
            ->allowEmptyString('value_requests');

        $validator
            ->integer('judge_id')
            ->allowEmptyString('judge_id');

        $validator
            ->dateTime('approved_date')
            ->allowEmptyDateTime('approved_date');

        $validator
            ->integer('approved_by')
            ->allowEmptyString('approved_by');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('import_id')
            ->allowEmptyString('import_id');

        $validator
            ->scalar('reason')
            ->allowEmptyString('reason');

        $validator
            ->integer('authors')
            ->allowEmptyString('authors');

        $validator
            ->scalar('link')
            ->notEmptyString('link');

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
        $rules->add($rules->existsIn('nature_id', 'Natures'), ['errorField' => 'nature_id']);
        $rules->add($rules->existsIn('object_id', 'Objectives'), ['errorField' => 'object_id']);
        $rules->add($rules->existsIn('caso_id', 'Casos'), ['errorField' => 'caso_id']);
        $rules->add($rules->existsIn('airline_company_id', 'AirlineCompanies'), ['errorField' => 'airline_company_id']);
        $rules->add($rules->existsIn('district_id', 'Districts'), ['errorField' => 'district_id']);
        $rules->add($rules->existsIn('result_id', 'Results'), ['errorField' => 'result_id']);
        $rules->add($rules->existsIn('request_id', 'Requests'), ['errorField' => 'request_id']);
        $rules->add($rules->existsIn('type_id', 'Types'), ['errorField' => 'type_id']);
        $rules->add($rules->existsIn('judge_id', 'Judges'), ['errorField' => 'judge_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('import_id', 'Imports'), ['errorField' => 'import_id']);

        return $rules;
    }
}
