<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Releases Model
 *
 * @method \App\Model\Entity\Release newEmptyEntity()
 * @method \App\Model\Entity\Release newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Release[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Release get($primaryKey, $options = [])
 * @method \App\Model\Entity\Release findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Release patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Release[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Release|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReleasesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('releases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('id', 'create')
            ->notEmptyString('id')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('information_system')
            ->maxLength('information_system', 255)
            ->allowEmptyString('information_system');

        $validator
            ->scalar('information_institution')
            ->maxLength('information_institution', 255)
            ->allowEmptyString('information_institution');

        $validator
            ->scalar('information_storage_vendor')
            ->maxLength('information_storage_vendor', 255)
            ->allowEmptyString('information_storage_vendor');

        $validator
            ->scalar('information_filesystem_type')
            ->maxLength('information_filesystem_type', 255)
            ->allowEmptyFile('information_filesystem_type');

        $validator
            ->integer('information_client_nodes')
            ->allowEmptyString('information_client_nodes');

        $validator
            ->integer('information_client_total_procs')
            ->allowEmptyString('information_client_total_procs');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->decimal('io500_score')
            ->allowEmptyString('io500_score');

        $validator
            ->decimal('io500_bw')
            ->allowEmptyString('io500_bw');

        $validator
            ->decimal('io500_md')
            ->allowEmptyString('io500_md');

        $validator
            ->scalar('information_data')
            ->maxLength('information_data', 255)
            ->allowEmptyString('information_data');

        $validator
            ->scalar('information_list_name')
            ->maxLength('information_list_name', 255)
            ->allowEmptyString('information_list_name');

        $validator
            ->scalar('information_identifier')
            ->maxLength('information_identifier', 255)
            ->allowEmptyString('information_identifier');

        $validator
            ->boolean('information_10_node_challenge')
            ->notEmptyString('information_10_node_challenge');

        $validator
            ->scalar('marker_score')
            ->maxLength('marker_score', 255)
            ->allowEmptyString('marker_score');

        $validator
            ->scalar('marker_md')
            ->maxLength('marker_md', 255)
            ->allowEmptyString('marker_md');

        $validator
            ->decimal('ior_easy_write')
            ->allowEmptyString('ior_easy_write');

        $validator
            ->scalar('mdtest_easy_write')
            ->allowEmptyString('mdtest_easy_write');

        $validator
            ->scalar('ior_hard_write')
            ->allowEmptyString('ior_hard_write');

        $validator
            ->scalar('mdtest_hard_write')
            ->allowEmptyString('mdtest_hard_write');

        $validator
            ->scalar('find_hard')
            ->allowEmptyString('find_hard');

        $validator
            ->scalar('ior_easy_read')
            ->allowEmptyString('ior_easy_read');

        $validator
            ->scalar('mdtest_easy_stat')
            ->allowEmptyString('mdtest_easy_stat');

        $validator
            ->scalar('ior_hard_read')
            ->allowEmptyString('ior_hard_read');

        $validator
            ->scalar('mdtest_hard_stat')
            ->allowEmptyString('mdtest_hard_stat');

        $validator
            ->scalar('mdtest_easy_delete')
            ->allowEmptyString('mdtest_easy_delete');

        $validator
            ->scalar('mdtest_hard_read')
            ->allowEmptyString('mdtest_hard_read');

        $validator
            ->scalar('mdtest_hard_delete')
            ->allowEmptyString('mdtest_hard_delete');

        $validator
            ->scalar('ior_easy_write_open')
            ->allowEmptyString('ior_easy_write_open');

        $validator
            ->scalar('ior_easy_write_close')
            ->allowEmptyString('ior_easy_write_close');

        $validator
            ->scalar('ior_easy_write_ppn')
            ->allowEmptyString('ior_easy_write_ppn');

        $validator
            ->scalar('ior_easy_read_open')
            ->allowEmptyString('ior_easy_read_open');

        $validator
            ->scalar('ior_easy_read_close')
            ->allowEmptyString('ior_easy_read_close');

        $validator
            ->scalar('ior_easy_read_ppn')
            ->allowEmptyString('ior_easy_read_ppn');

        $validator
            ->scalar('ior_hard_write_open')
            ->allowEmptyString('ior_hard_write_open');

        $validator
            ->scalar('ior_hard_write_close')
            ->allowEmptyString('ior_hard_write_close');

        $validator
            ->scalar('ior_hard_write_ppn')
            ->allowEmptyString('ior_hard_write_ppn');

        $validator
            ->scalar('ior_hard_read_open')
            ->allowEmptyString('ior_hard_read_open');

        $validator
            ->scalar('ior_hard_read_close')
            ->allowEmptyString('ior_hard_read_close');

        $validator
            ->scalar('ior_hard_read_ppn')
            ->allowEmptyString('ior_hard_read_ppn');

        $validator
            ->scalar('mdtest_version')
            ->allowEmptyString('mdtest_version');

        $validator
            ->scalar('mdtest_easy_write_full_cmd')
            ->allowEmptyString('mdtest_easy_write_full_cmd');

        $validator
            ->scalar('mdtest_easy_requested_files')
            ->allowEmptyFile('mdtest_easy_requested_files');

        $validator
            ->scalar('mdtest_hard_write_full_cmd')
            ->allowEmptyString('mdtest_hard_write_full_cmd');

        $validator
            ->scalar('mdtest_hard_requested_files')
            ->allowEmptyFile('mdtest_hard_requested_files');

        $validator
            ->scalar('ior_easy_write_seconds')
            ->allowEmptyString('ior_easy_write_seconds');

        $validator
            ->scalar('ior_hard_write_seconds')
            ->allowEmptyString('ior_hard_write_seconds');

        $validator
            ->scalar('mdtest_easy_write_seconds')
            ->allowEmptyString('mdtest_easy_write_seconds');

        $validator
            ->scalar('mdtest_hard_write_seconds')
            ->allowEmptyString('mdtest_hard_write_seconds');

        $validator
            ->scalar('io500_find_matched')
            ->allowEmptyString('io500_find_matched');

        $validator
            ->scalar('io500_find_scanned')
            ->allowEmptyString('io500_find_scanned');

        $validator
            ->scalar('io500_find_elapsed_secs')
            ->allowEmptyString('io500_find_elapsed_secs');

        $validator
            ->scalar('information_date')
            ->allowEmptyString('information_date');

        $validator
            ->scalar('information_sysname')
            ->allowEmptyString('information_sysname');

        $validator
            ->scalar('io500_cleanup_workdir')
            ->allowEmptyString('io500_cleanup_workdir');

        $validator
            ->scalar('io500_find_cmd_args')
            ->allowEmptyString('io500_find_cmd_args');

        $validator
            ->scalar('io500_find_cmd')
            ->allowEmptyString('io500_find_cmd');

        $validator
            ->scalar('io500_find_mpi')
            ->allowEmptyString('io500_find_mpi');

        $validator
            ->scalar('io500_info_data_storage_type')
            ->allowEmptyString('io500_info_data_storage_type');

        $validator
            ->scalar('io500_info_filesystem')
            ->allowEmptyFile('io500_info_filesystem');

        $validator
            ->scalar('io500_info_filesystem_vendor')
            ->allowEmptyFile('io500_info_filesystem_vendor');

        $validator
            ->scalar('io500_info_filesystem_version')
            ->allowEmptyFile('io500_info_filesystem_version');

        $validator
            ->scalar('io500_info_institute_name')
            ->allowEmptyString('io500_info_institute_name');

        $validator
            ->scalar('io500_info_metadata_storage_type')
            ->allowEmptyString('io500_info_metadata_storage_type');

        $validator
            ->scalar('io500_info_num_client_nodes')
            ->allowEmptyString('io500_info_num_client_nodes');

        $validator
            ->scalar('io500_info_num_data_server_nodes')
            ->allowEmptyString('io500_info_num_data_server_nodes');

        $validator
            ->scalar('io500_info_num_data_storage_devices')
            ->allowEmptyString('io500_info_num_data_storage_devices');

        $validator
            ->scalar('io500_info_num_metadata_server_nodes')
            ->allowEmptyString('io500_info_num_metadata_server_nodes');

        $validator
            ->scalar('io500_info_num_metadata_storage_devices')
            ->allowEmptyString('io500_info_num_metadata_storage_devices');

        $validator
            ->scalar('io500_info_procs_per_node')
            ->allowEmptyString('io500_info_procs_per_node');

        $validator
            ->scalar('io500_info_storage_age_in_months')
            ->allowEmptyString('io500_info_storage_age_in_months');

        $validator
            ->scalar('io500_info_storage_install_date')
            ->allowEmptyString('io500_info_storage_install_date');

        $validator
            ->scalar('io500_info_storage_interface')
            ->allowEmptyString('io500_info_storage_interface');

        $validator
            ->scalar('io500_info_storage_network')
            ->allowEmptyString('io500_info_storage_network');

        $validator
            ->scalar('io500_info_system_name')
            ->allowEmptyString('io500_info_system_name');

        $validator
            ->scalar('io500_info_whatever')
            ->allowEmptyString('io500_info_whatever');

        $validator
            ->scalar('io500_ior_cmd')
            ->allowEmptyString('io500_ior_cmd');

        $validator
            ->scalar('io500_ior_easy_params')
            ->allowEmptyString('io500_ior_easy_params');

        $validator
            ->scalar('io500_ior_hard_other_options')
            ->allowEmptyString('io500_ior_hard_other_options');

        $validator
            ->scalar('io500_ior_hard_writes_per_proc')
            ->allowEmptyString('io500_ior_hard_writes_per_proc');

        $validator
            ->scalar('io500_mdreal_cmd')
            ->allowEmptyString('io500_mdreal_cmd');

        $validator
            ->scalar('io500_mdreal_params')
            ->allowEmptyString('io500_mdreal_params');

        $validator
            ->scalar('io500_mdtest_cmd')
            ->allowEmptyString('io500_mdtest_cmd');

        $validator
            ->scalar('io500_mdtest_easy_files_per_proc')
            ->allowEmptyFile('io500_mdtest_easy_files_per_proc');

        $validator
            ->scalar('io500_mdtest_easy_params')
            ->allowEmptyString('io500_mdtest_easy_params');

        $validator
            ->scalar('io500_mdtest_hard_files_per_proc')
            ->allowEmptyFile('io500_mdtest_hard_files_per_proc');

        $validator
            ->scalar('io500_mpiargs')
            ->allowEmptyString('io500_mpiargs');

        $validator
            ->scalar('io500_mpirun')
            ->allowEmptyString('io500_mpirun');

        $validator
            ->scalar('io500_result_dir')
            ->allowEmptyString('io500_result_dir');

        $validator
            ->scalar('io500_run_find')
            ->allowEmptyString('io500_run_find');

        $validator
            ->scalar('io500_run_ior_easy_read')
            ->allowEmptyString('io500_run_ior_easy_read');

        $validator
            ->scalar('io500_run_ior_easy')
            ->allowEmptyString('io500_run_ior_easy');

        $validator
            ->scalar('io500_run_ior_hard_read')
            ->allowEmptyString('io500_run_ior_hard_read');

        $validator
            ->scalar('io500_run_ior_hard')
            ->allowEmptyString('io500_run_ior_hard');

        $validator
            ->scalar('io500_run_md_easy_delete')
            ->allowEmptyString('io500_run_md_easy_delete');

        $validator
            ->scalar('io500_run_md_easy_stat')
            ->allowEmptyString('io500_run_md_easy_stat');

        $validator
            ->scalar('io500_run_md_easy')
            ->allowEmptyString('io500_run_md_easy');

        $validator
            ->scalar('io500_run_md_hard_delete')
            ->allowEmptyString('io500_run_md_hard_delete');

        $validator
            ->scalar('io500_run_md_hard_read')
            ->allowEmptyString('io500_run_md_hard_read');

        $validator
            ->scalar('io500_run_md_hard_stat')
            ->allowEmptyString('io500_run_md_hard_stat');

        $validator
            ->scalar('io500_run_md_hard')
            ->allowEmptyString('io500_run_md_hard');

        $validator
            ->scalar('io500_run_mdreal')
            ->allowEmptyString('io500_run_mdreal');

        $validator
            ->scalar('io500_workdir')
            ->allowEmptyString('io500_workdir');

        $validator
            ->scalar('information_stonewall_seconds')
            ->allowEmptyString('information_stonewall_seconds');

        $validator
            ->scalar('io500_ior_easy_size')
            ->allowEmptyString('io500_ior_easy_size');

        $validator
            ->scalar('io500_mdtest_hard_other_options')
            ->allowEmptyString('io500_mdtest_hard_other_options');

        $validator
            ->scalar('io500_stonewall_timer')
            ->allowEmptyString('io500_stonewall_timer');

        $validator
            ->scalar('mdtest_easy_stonewall_files')
            ->allowEmptyFile('mdtest_easy_stonewall_files');

        $validator
            ->scalar('mdtest_hard_stonewall_files')
            ->allowEmptyFile('mdtest_hard_stonewall_files');

        $validator
            ->scalar('io500_info_modules')
            ->allowEmptyString('io500_info_modules');

        $validator
            ->scalar('io500_mount_options')
            ->allowEmptyString('io500_mount_options');

        $validator
            ->scalar('io500_info_filesysem')
            ->allowEmptyFile('io500_info_filesysem');

        $validator
            ->scalar('io500_mdtest_files_per_proc')
            ->allowEmptyFile('io500_mdtest_files_per_proc');

        $validator
            ->scalar('io500_mpi_prefix')
            ->allowEmptyString('io500_mpi_prefix');

        $validator
            ->scalar('io500_mpienv')
            ->allowEmptyString('io500_mpienv');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
