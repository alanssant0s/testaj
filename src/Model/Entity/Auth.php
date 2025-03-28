<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Auth Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\User[] $users
 */
class Auth extends Entity
{
    public static $_TYPES = [4 => 'Normal', 3 => 'Moderador', 2 => 'Admin', 1 => 'Master'];
    public static $_TYPE_MASTER = 1;
    public static $_TYPE_ADMIN = 2;
    public static $_TYPE_MODERADOR = 3;
    public static $_TYPE_NORMAL = 4;
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
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'users' => true,
    ];
}
