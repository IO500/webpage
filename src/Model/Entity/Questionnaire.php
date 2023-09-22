<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Questionnaire Entity
 *
 * @property int $id
 * @property int $submission_id
 * @property string $system_purpose
 * @property string $availability
 * @property string $storage_system_software
 * @property string $runtime_environment
 * @property string $fault_tolerance_mechanisms
 * @property string $execution
 * @property string $caching
 * @property string $data_source
 * @property string $trust
 * @property string $reproducibility
 * @property string $feedback
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Submission $submission
 */
class Questionnaire extends Entity
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
        '*' => true,
    ];
}
