<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListingsSubmission Entity
 *
 * @property int $id
 * @property int $listing_id
 * @property int $submission_id
 * @property float $score
 *
 * @property \App\Model\Entity\Listing $listing
 * @property \App\Model\Entity\Submission $submission
 */
class ListingsSubmission extends Entity
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
        'id' => true,
        'listing_id' => true,
        'submission_id' => true,
        'score' => true,
        'listing' => true,
        'submission' => true,
    ];
}
