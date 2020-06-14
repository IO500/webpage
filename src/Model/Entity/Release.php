<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Release Entity
 *
 * @property int $id
 * @property string|null $information_system
 * @property string|null $information_institution
 * @property string|null $information_storage_vendor
 * @property string|null $information_filesystem_type
 * @property int|null $information_client_nodes
 * @property int|null $information_client_total_procs
 * @property string $status
 * @property string|null $io500_score
 * @property string|null $io500_bw
 * @property string|null $io500_md
 * @property string|null $information_data
 * @property string|null $information_list_name
 * @property string|null $information_identifier
 * @property bool $information_10_node_challenge
 * @property string|null $marker_score
 * @property string|null $marker_md
 * @property string|null $ior_easy_write
 * @property string|null $mdtest_easy_write
 * @property string|null $ior_hard_write
 * @property string|null $mdtest_hard_write
 * @property string|null $find_hard
 * @property string|null $ior_easy_read
 * @property string|null $mdtest_easy_stat
 * @property string|null $ior_hard_read
 * @property string|null $mdtest_hard_stat
 * @property string|null $mdtest_easy_delete
 * @property string|null $mdtest_hard_read
 * @property string|null $mdtest_hard_delete
 * @property string|null $ior_easy_write_open
 * @property string|null $ior_easy_write_close
 * @property string|null $ior_easy_write_ppn
 * @property string|null $ior_easy_read_open
 * @property string|null $ior_easy_read_close
 * @property string|null $ior_easy_read_ppn
 * @property string|null $ior_hard_write_open
 * @property string|null $ior_hard_write_close
 * @property string|null $ior_hard_write_ppn
 * @property string|null $ior_hard_read_open
 * @property string|null $ior_hard_read_close
 * @property string|null $ior_hard_read_ppn
 * @property string|null $mdtest_version
 * @property string|null $mdtest_easy_write_full_cmd
 * @property string|null $mdtest_easy_requested_files
 * @property string|null $mdtest_hard_write_full_cmd
 * @property string|null $mdtest_hard_requested_files
 * @property string|null $ior_easy_write_seconds
 * @property string|null $ior_hard_write_seconds
 * @property string|null $mdtest_easy_write_seconds
 * @property string|null $mdtest_hard_write_seconds
 * @property string|null $io500_find_matched
 * @property string|null $io500_find_scanned
 * @property string|null $io500_find_elapsed_secs
 * @property string|null $information_date
 * @property string|null $information_sysname
 * @property string|null $io500_cleanup_workdir
 * @property string|null $io500_find_cmd_args
 * @property string|null $io500_find_cmd
 * @property string|null $io500_find_mpi
 * @property string|null $io500_info_data_storage_type
 * @property string|null $io500_info_filesystem
 * @property string|null $io500_info_filesystem_vendor
 * @property string|null $io500_info_filesystem_version
 * @property string|null $io500_info_institute_name
 * @property string|null $io500_info_metadata_storage_type
 * @property string|null $io500_info_num_client_nodes
 * @property string|null $io500_info_num_data_server_nodes
 * @property string|null $io500_info_num_data_storage_devices
 * @property string|null $io500_info_num_metadata_server_nodes
 * @property string|null $io500_info_num_metadata_storage_devices
 * @property string|null $io500_info_procs_per_node
 * @property string|null $io500_info_storage_age_in_months
 * @property string|null $io500_info_storage_install_date
 * @property string|null $io500_info_storage_interface
 * @property string|null $io500_info_storage_network
 * @property string|null $io500_info_system_name
 * @property string|null $io500_info_whatever
 * @property string|null $io500_ior_cmd
 * @property string|null $io500_ior_easy_params
 * @property string|null $io500_ior_hard_other_options
 * @property string|null $io500_ior_hard_writes_per_proc
 * @property string|null $io500_mdreal_cmd
 * @property string|null $io500_mdreal_params
 * @property string|null $io500_mdtest_cmd
 * @property string|null $io500_mdtest_easy_files_per_proc
 * @property string|null $io500_mdtest_easy_params
 * @property string|null $io500_mdtest_hard_files_per_proc
 * @property string|null $io500_mpiargs
 * @property string|null $io500_mpirun
 * @property string|null $io500_result_dir
 * @property string|null $io500_run_find
 * @property string|null $io500_run_ior_easy_read
 * @property string|null $io500_run_ior_easy
 * @property string|null $io500_run_ior_hard_read
 * @property string|null $io500_run_ior_hard
 * @property string|null $io500_run_md_easy_delete
 * @property string|null $io500_run_md_easy_stat
 * @property string|null $io500_run_md_easy
 * @property string|null $io500_run_md_hard_delete
 * @property string|null $io500_run_md_hard_read
 * @property string|null $io500_run_md_hard_stat
 * @property string|null $io500_run_md_hard
 * @property string|null $io500_run_mdreal
 * @property string|null $io500_workdir
 * @property string|null $information_stonewall_seconds
 * @property string|null $io500_ior_easy_size
 * @property string|null $io500_mdtest_hard_other_options
 * @property string|null $io500_stonewall_timer
 * @property string|null $mdtest_easy_stonewall_files
 * @property string|null $mdtest_hard_stonewall_files
 * @property string|null $io500_info_modules
 * @property string|null $io500_mount_options
 * @property string|null $io500_info_filesysem
 * @property string|null $io500_mdtest_files_per_proc
 * @property string|null $io500_mpi_prefix
 * @property string|null $io500_mpienv
 */
class Release extends Entity
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
        'information_system' => true,
        'information_institution' => true,
        'information_storage_vendor' => true,
        'information_filesystem_type' => true,
        'information_client_nodes' => true,
        'information_client_total_procs' => true,
        'status' => true,
        'io500_score' => true,
        'io500_bw' => true,
        'io500_md' => true,
        'information_data' => true,
        'information_list_name' => true,
        'information_identifier' => true,
        'information_10_node_challenge' => true,
        'marker_score' => true,
        'marker_md' => true,
        'ior_easy_write' => true,
        'mdtest_easy_write' => true,
        'ior_hard_write' => true,
        'mdtest_hard_write' => true,
        'find_hard' => true,
        'ior_easy_read' => true,
        'mdtest_easy_stat' => true,
        'ior_hard_read' => true,
        'mdtest_hard_stat' => true,
        'mdtest_easy_delete' => true,
        'mdtest_hard_read' => true,
        'mdtest_hard_delete' => true,
        'ior_easy_write_open' => true,
        'ior_easy_write_close' => true,
        'ior_easy_write_ppn' => true,
        'ior_easy_read_open' => true,
        'ior_easy_read_close' => true,
        'ior_easy_read_ppn' => true,
        'ior_hard_write_open' => true,
        'ior_hard_write_close' => true,
        'ior_hard_write_ppn' => true,
        'ior_hard_read_open' => true,
        'ior_hard_read_close' => true,
        'ior_hard_read_ppn' => true,
        'mdtest_version' => true,
        'mdtest_easy_write_full_cmd' => true,
        'mdtest_easy_requested_files' => true,
        'mdtest_hard_write_full_cmd' => true,
        'mdtest_hard_requested_files' => true,
        'ior_easy_write_seconds' => true,
        'ior_hard_write_seconds' => true,
        'mdtest_easy_write_seconds' => true,
        'mdtest_hard_write_seconds' => true,
        'io500_find_matched' => true,
        'io500_find_scanned' => true,
        'io500_find_elapsed_secs' => true,
        'information_date' => true,
        'information_sysname' => true,
        'io500_cleanup_workdir' => true,
        'io500_find_cmd_args' => true,
        'io500_find_cmd' => true,
        'io500_find_mpi' => true,
        'io500_info_data_storage_type' => true,
        'io500_info_filesystem' => true,
        'io500_info_filesystem_vendor' => true,
        'io500_info_filesystem_version' => true,
        'io500_info_institute_name' => true,
        'io500_info_metadata_storage_type' => true,
        'io500_info_num_client_nodes' => true,
        'io500_info_num_data_server_nodes' => true,
        'io500_info_num_data_storage_devices' => true,
        'io500_info_num_metadata_server_nodes' => true,
        'io500_info_num_metadata_storage_devices' => true,
        'io500_info_procs_per_node' => true,
        'io500_info_storage_age_in_months' => true,
        'io500_info_storage_install_date' => true,
        'io500_info_storage_interface' => true,
        'io500_info_storage_network' => true,
        'io500_info_system_name' => true,
        'io500_info_whatever' => true,
        'io500_ior_cmd' => true,
        'io500_ior_easy_params' => true,
        'io500_ior_hard_other_options' => true,
        'io500_ior_hard_writes_per_proc' => true,
        'io500_mdreal_cmd' => true,
        'io500_mdreal_params' => true,
        'io500_mdtest_cmd' => true,
        'io500_mdtest_easy_files_per_proc' => true,
        'io500_mdtest_easy_params' => true,
        'io500_mdtest_hard_files_per_proc' => true,
        'io500_mpiargs' => true,
        'io500_mpirun' => true,
        'io500_result_dir' => true,
        'io500_run_find' => true,
        'io500_run_ior_easy_read' => true,
        'io500_run_ior_easy' => true,
        'io500_run_ior_hard_read' => true,
        'io500_run_ior_hard' => true,
        'io500_run_md_easy_delete' => true,
        'io500_run_md_easy_stat' => true,
        'io500_run_md_easy' => true,
        'io500_run_md_hard_delete' => true,
        'io500_run_md_hard_read' => true,
        'io500_run_md_hard_stat' => true,
        'io500_run_md_hard' => true,
        'io500_run_mdreal' => true,
        'io500_workdir' => true,
        'information_stonewall_seconds' => true,
        'io500_ior_easy_size' => true,
        'io500_mdtest_hard_other_options' => true,
        'io500_stonewall_timer' => true,
        'mdtest_easy_stonewall_files' => true,
        'mdtest_hard_stonewall_files' => true,
        'io500_info_modules' => true,
        'io500_mount_options' => true,
        'io500_info_filesysem' => true,
        'io500_mdtest_files_per_proc' => true,
        'io500_mpi_prefix' => true,
        'io500_mpienv' => true,
    ];
}
