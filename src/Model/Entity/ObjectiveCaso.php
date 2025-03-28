<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersInUnits Entity
 *
 * @property int $objective_id
 * @property int $caso_id
 *
 * @property \App\Model\Entity\Objective $objective
 * @property \App\Model\Entity\Caso $caso
 */
class ObjectiveCaso extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'objective' => true,
        'caso' => true,
        'objective_id' => true,
        'caso_id' => true,
    ];
}
