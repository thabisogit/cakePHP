<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LearnerSchool Entity
 *
 * @property int $id
 * @property int $leaner_id
 * @property int $school_id
 *
 * @property \App\Model\Entity\Leaner $leaner
 * @property \App\Model\Entity\School $school
 */
class LearnerSchool extends Entity
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
        'school_id' => true,
        'leaner' => true,
        'school' => true,
    ];
}
