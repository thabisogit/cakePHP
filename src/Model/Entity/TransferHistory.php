<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransferHistory Entity
 *
 * @property int $id
 * @property int $leaner_id
 * @property int $from_school_id
 * @property int $to_school_id
 *
 * @property \App\Model\Entity\Leaner $leaner
 * @property \App\Model\Entity\FromSchool $from_school
 * @property \App\Model\Entity\ToSchool $to_school
 */
class TransferHistory extends Entity
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
        'leaner_id' => true,
        'from_school_id' => true,
        'to_school_id' => true,
        'leaner' => true,
        'from_school' => true,
        'to_school' => true,
    ];
}
