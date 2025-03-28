<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * AuditDeltas Model
 *
 * @package AuditLog\Model\Table
 *
 * @property \App\Model\Table\AuditsTable&\Cake\ORM\Association\BelongsTo $Audits
 *
 * @method \App\Model\Entity\AuditDelta get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuditDelta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuditDelta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuditDelta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuditDelta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuditDelta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuditDelta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuditDelta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class AuditDeltasTable extends Table
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

        $this->setTable('audit_deltas');
        $this->setDisplayField('property_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Audits', [
            'foreignKey' => 'audit_id',
            'joinType' => 'INNER',
            'className' => 'AuditLog.Audits',
        ]);

        $this->addBehavior('CounterCache', [
            'Audits' => [
                'delta_count',
            ],
        ]);
    }
}
