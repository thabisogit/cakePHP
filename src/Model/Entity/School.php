<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * School Entity
 *
 * @property int $id
 * @property string $school_name
 * @property int|null $province_id
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\LearnerSchool[] $learner_school
 */
class School extends Entity
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
        'school_name' => true,
        'province_id' => true,
        'province' => true,
        'learner_school' => true,
    ];
}
