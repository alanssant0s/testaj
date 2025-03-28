<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Process Entity
 *
 * @property string $process_number
 * @property int $nature_id
 * @property int|null $object_id
 * @property int|null $caso_id
 * @property string|null $description
 * @property string|null $jurisprudence
 * @property int|null $airline_company_id
 * @property int|null $district_id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property int|null $result_id
 * @property int|null $request_id
 * @property int|null $approved_by
 * @property \Cake\I18n\FrozenTime|null $approved_date
 * @property int|null $user_id
 * @property int|null $type_id
 * @property string|null $value_requests
 * @property int|null $judge_id
 * @property int $import_id
 * @property string|null $reason
 * @property int|null $authors
 * @property string $link
 * 
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Nature $nature
 * @property \App\Model\Entity\Objective $objective
 * @property \App\Model\Entity\Caso $caso
 * @property \App\Model\Entity\AirlineCompany $airline_company
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Result $result
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Judge $judge
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Import $import
 */
class Process extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'process_number' => true,
        'nature_id' => true,
        'object_id' => true,
        'caso_id' => true,
        'description' => true,
        'jurisprudence' => true,
        'airline_company_id' => true,
        'district_id' => true,
        'date' => true,
        'result_id' => true,
        'request_id' => true,
        'approved_by' => true,
        'approved_date' => true,
        'user_id' => true,
        'type_id' => true,
        'value_requests' => true,
        'judge_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'nature' => true,
        'objective' => true,
        'caso' => true,
        'airline_company' => true,
        'district' => true,
        'result' => true,
        'request' => true,
        'type' => true,
        'judge' => true,
        'user' => true,
        'import' => true,
        'import_id' => true,
        'reason' => true,
        'authors' => true,
        'link' => true
    ];
}
