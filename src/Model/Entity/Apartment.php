<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apartment Entity
 *
 * @property int $id
 * @property int|null $apartment_type_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $address
 * @property string|null $zipcode
 * @property string|null $apartment_number
 * @property int|null $floor
 * @property int|null $rooms
 * @property int|null $bathrooms
 * @property bool|null $has_heating
 * @property bool|null $has_gas
 * @property bool|null $has_parking
 * @property float|null $apartment_size
 * @property bool|null $is_occuped
 * @property int|null $status_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ApartmentType $apartment_type
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\User $user
 */
class Apartment extends Entity
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
        'apartment_type_id' => true,
        'title' => true,
        'description' => true,
        'address' => true,
        'zipcode' => true,
        'apartment_number' => true,
        'floor' => true,
        'rooms' => true,
        'bathrooms' => true,
        'has_heating' => true,
        'has_gas' => true,
        'has_parking' => true,
        'apartment_size' => true,
        'is_occuped' => true,
        'status_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'apartment_type' => true,
        'status' => true,
        'user' => true,
    ];
}
