<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Learner Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $id_number
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string $home_address
 * @property string $contact_number
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Learner extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'id_number' => true,
        'dob' => true,
        'home_address' => true,
        'contact_number' => true,
        'created' => true,
        'modified' => true,
    ];
}
