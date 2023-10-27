<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $password
 * @property int|null $status_id
 * @property int|null $role_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Apartment[] $apartments
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
        'lastname' => true,
        'email' => true,
        'password' => true,
        'status_id' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'role' => true,
        'apartments' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
