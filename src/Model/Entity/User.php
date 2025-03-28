<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $plan_id
 * @property int $auth_id
 * @property string|null $photo_url
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Plan $plan
 * @property \App\Model\Entity\Auth $auth
 * @property \App\Model\Entity\Audit[] $audits
 * @property \App\Model\Entity\Process[] $processes
 * @property \App\Model\Entity\Import[] $imports
 */
class User extends Entity
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
        'name' => true,
        'email' => true,
        'password' => true,
        'plan_id' => true,
        'auth_id' => true,
        'photo_url' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'plan' => true,
        'auth' => true,
        'audits' => true,
        'processes' => true,
        'imports' => true
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
