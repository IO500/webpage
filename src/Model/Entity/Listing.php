<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listing Entity
 *
 * @property int $id
 * @property int $type_id
 * @property int $release_id
 * @property string $description
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Release $release
 * @property \App\Model\Entity\ListSc1810node[] $list_sc1810node
 * @property \App\Model\Entity\ListSc18Io500[] $list_sc18_io500
 * @property \App\Model\Entity\Submission[] $submissions
 */
class Listing extends Entity
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
        'type_id' => true,
        'release_id' => true,
        'description' => true,
        'type' => true,
        'release' => true,
        'list_sc1810node' => true,
        'list_sc18_io500' => true,
        'submissions' => true,
    ];
}
