<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Submission Entity
 *
 * @property int $id
 * @property int $release_id
 * @property string|null $information_system
 * @property string|null $information_institution
 * @property string|null $information_storage_vendor
 * @property string|null $information_filesystem_type
 * @property int|null $information_client_nodes
 * @property int|null $information_client_total_procs
 * @property string|null $io500_score
 * @property string|null $io500_bw
 * @property string|null $io500_md
 * @property string|null $io500_tot_iops
 * @property string|null $information_data
 * @property bool $information_10_node_challenge
 * @property string|null $information_list_name
 * @property string|null $information_identifier
 * @property string|null $information_submitter
 * @property string|null $information_submission_date
 * @property string|null $information_embargo_end_date
 * @property string|null $information_storage_install_date
 * @property string|null $information_storage_refresh_date
 * @property string|null $information_filesystem_name
 * @property string|null $information_filesystem_version
 * @property string|null $information_client_procs_per_node
 * @property string|null $information_client_operating_system
 * @property string|null $information_client_operating_system_version
 * @property string|null $information_client_kernel_version
 * @property string|null $information_md_nodes
 * @property string|null $information_md_storage_devices
 * @property string|null $information_md_storage_type
 * @property string|null $information_md_volatile_memory_capacity
 * @property string|null $information_md_storage_interface
 * @property string|null $information_md_network
 * @property string|null $information_md_software_version
 * @property string|null $information_md_operating_system_version
 * @property string|null $information_ds_nodes
 * @property string|null $information_ds_storage_devices
 * @property string|null $information_ds_storage_type
 * @property string|null $information_ds_volatile_memory_capacity
 * @property string|null $information_ds_storage_interface
 * @property string|null $information_ds_network
 * @property string|null $information_ds_software_version
 * @property string|null $information_ds_operating_system_version
 * @property string|null $information_note
 * @property string|null $information_best
 * @property string|null $ior_easy_write
 * @property string|null $ior_easy_read
 * @property string|null $ior_hard_write
 * @property string|null $ior_hard_read
 * @property string|null $mdtest_easy_write
 * @property string|null $mdtest_easy_stat
 * @property string|null $mdtest_easy_delete
 * @property string|null $mdtest_hard_write
 * @property string|null $mdtest_hard_read
 * @property string|null $mdtest_hard_stat
 * @property string|null $mdtest_hard_delete
 * @property int|null $find_easy
 * @property string|null $find_hard
 * @property string|null $marker_score
 * @property string|null $marker_md
 * @property string $storage_data
 * @property string $status
 * @property \Cake\I18n\FrozenDate|null $valid_from
 * @property \Cake\I18n\FrozenDate|null $valid_to
 */
class Submission extends Entity
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
        'release_id' => true,
        'information_system' => true,
        'information_institution' => true,
        'information_storage_vendor' => true,
        'information_filesystem_type' => true,
        'information_client_nodes' => true,
        'information_client_total_procs' => true,
        'io500_score' => true,
        'io500_bw' => true,
        'io500_md' => true,
        'io500_tot_iops' => true,
        'information_data' => true,
        'information_10_node_challenge' => true,
        'information_list_name' => true,
        'information_identifier' => true,
        'information_submitter' => true,
        'information_submission_date' => true,
        'information_embargo_end_date' => true,
        'information_storage_install_date' => true,
        'information_storage_refresh_date' => true,
        'information_filesystem_name' => true,
        'information_filesystem_version' => true,
        'information_client_procs_per_node' => true,
        'information_client_operating_system' => true,
        'information_client_operating_system_version' => true,
        'information_client_kernel_version' => true,
        'information_md_nodes' => true,
        'information_md_storage_devices' => true,
        'information_md_storage_type' => true,
        'information_md_volatile_memory_capacity' => true,
        'information_md_storage_interface' => true,
        'information_md_network' => true,
        'information_md_software_version' => true,
        'information_md_operating_system_version' => true,
        'information_ds_nodes' => true,
        'information_ds_storage_devices' => true,
        'information_ds_storage_type' => true,
        'information_ds_volatile_memory_capacity' => true,
        'information_ds_storage_interface' => true,
        'information_ds_network' => true,
        'information_ds_software_version' => true,
        'information_ds_operating_system_version' => true,
        'information_note' => true,
        'information_best' => true,
        'ior_easy_write' => true,
        'ior_easy_read' => true,
        'ior_hard_write' => true,
        'ior_hard_read' => true,
        'mdtest_easy_write' => true,
        'mdtest_easy_stat' => true,
        'mdtest_easy_delete' => true,
        'mdtest_hard_write' => true,
        'mdtest_hard_read' => true,
        'mdtest_hard_stat' => true,
        'mdtest_hard_delete' => true,
        'find_easy' => true,
        'find_hard' => true,
        'marker_score' => true,
        'marker_md' => true,
        'storage_data' => true,
        'status' => true,
        'valid_from' => true,
        'valid_to' => true,
    ];
}
