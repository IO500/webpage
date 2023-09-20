<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Submissions Model
 *
 * @method \App\Model\Entity\Submission newEmptyEntity()
 * @method \App\Model\Entity\Submission newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Submission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Submission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Submission findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Submission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Submission[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Submission|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Submission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Submission[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submission[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submission[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Submission[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SubmissionsTable extends Table
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

        $this->setTable('submissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Releases', [
            'foreignKey' => 'release_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('ListingsSubmissions', [
            'foreignKey' => 'submission_id',
        ]);

        $this->hasOne('Questionnaires', [
            'foreignKey' => 'submission_id',
        ]);
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
            ->notEmptyString('id');

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
            ->decimal('io500_score')
            ->allowEmptyString('io500_score');

        $validator
            ->decimal('io500_bw')
            ->allowEmptyString('io500_bw');

        $validator
            ->decimal('io500_md')
            ->allowEmptyString('io500_md');

        $validator
            ->decimal('io500_tot_iops')
            ->allowEmptyString('io500_tot_iops');

        $validator
            ->scalar('information_data')
            ->maxLength('information_data', 255)
            ->allowEmptyString('information_data');

        $validator
            ->boolean('information_10_node_challenge')
            ->notEmptyString('information_10_node_challenge');

        $validator
            ->scalar('information_list_name')
            ->maxLength('information_list_name', 255)
            ->allowEmptyString('information_list_name');

        $validator
            ->scalar('information_identifier')
            ->maxLength('information_identifier', 255)
            ->allowEmptyString('information_identifier');

        $validator
            ->scalar('information_submitter')
            ->maxLength('information_submitter', 255)
            ->allowEmptyString('information_submitter');

        $validator
            ->scalar('information_submission_date')
            ->maxLength('information_submission_date', 255)
            ->allowEmptyString('information_submission_date');

        $validator
            ->scalar('information_embargo_end_date')
            ->maxLength('information_embargo_end_date', 255)
            ->allowEmptyString('information_embargo_end_date');

        $validator
            ->scalar('information_storage_install_date')
            ->maxLength('information_storage_install_date', 255)
            ->allowEmptyString('information_storage_install_date');

        $validator
            ->scalar('information_storage_refresh_date')
            ->maxLength('information_storage_refresh_date', 255)
            ->allowEmptyString('information_storage_refresh_date');

        $validator
            ->scalar('information_filesystem_name')
            ->maxLength('information_filesystem_name', 255)
            ->allowEmptyFile('information_filesystem_name');

        $validator
            ->scalar('information_filesystem_version')
            ->maxLength('information_filesystem_version', 255)
            ->allowEmptyFile('information_filesystem_version');

        $validator
            ->scalar('information_client_procs_per_node')
            ->maxLength('information_client_procs_per_node', 255)
            ->allowEmptyString('information_client_procs_per_node');

        $validator
            ->scalar('information_client_operating_system')
            ->maxLength('information_client_operating_system', 255)
            ->allowEmptyString('information_client_operating_system');

        $validator
            ->scalar('information_client_operating_system_version')
            ->maxLength('information_client_operating_system_version', 255)
            ->allowEmptyString('information_client_operating_system_version');

        $validator
            ->scalar('information_client_kernel_version')
            ->maxLength('information_client_kernel_version', 255)
            ->allowEmptyString('information_client_kernel_version');

        $validator
            ->scalar('information_md_nodes')
            ->maxLength('information_md_nodes', 255)
            ->allowEmptyString('information_md_nodes');

        $validator
            ->scalar('information_md_storage_devices')
            ->maxLength('information_md_storage_devices', 255)
            ->allowEmptyString('information_md_storage_devices');

        $validator
            ->scalar('information_md_storage_type')
            ->maxLength('information_md_storage_type', 255)
            ->allowEmptyString('information_md_storage_type');

        $validator
            ->scalar('information_md_volatile_memory_capacity')
            ->maxLength('information_md_volatile_memory_capacity', 255)
            ->allowEmptyString('information_md_volatile_memory_capacity');

        $validator
            ->scalar('information_md_storage_interface')
            ->maxLength('information_md_storage_interface', 255)
            ->allowEmptyString('information_md_storage_interface');

        $validator
            ->scalar('information_md_network')
            ->maxLength('information_md_network', 255)
            ->allowEmptyString('information_md_network');

        $validator
            ->scalar('information_md_software_version')
            ->maxLength('information_md_software_version', 255)
            ->allowEmptyString('information_md_software_version');

        $validator
            ->scalar('information_md_operating_system_version')
            ->maxLength('information_md_operating_system_version', 255)
            ->allowEmptyString('information_md_operating_system_version');

        $validator
            ->scalar('information_ds_nodes')
            ->maxLength('information_ds_nodes', 255)
            ->allowEmptyString('information_ds_nodes');

        $validator
            ->scalar('information_ds_storage_devices')
            ->maxLength('information_ds_storage_devices', 255)
            ->allowEmptyString('information_ds_storage_devices');

        $validator
            ->scalar('information_ds_storage_type')
            ->maxLength('information_ds_storage_type', 255)
            ->allowEmptyString('information_ds_storage_type');

        $validator
            ->scalar('information_ds_volatile_memory_capacity')
            ->maxLength('information_ds_volatile_memory_capacity', 255)
            ->allowEmptyString('information_ds_volatile_memory_capacity');

        $validator
            ->scalar('information_ds_storage_interface')
            ->maxLength('information_ds_storage_interface', 255)
            ->allowEmptyString('information_ds_storage_interface');

        $validator
            ->scalar('information_ds_network')
            ->maxLength('information_ds_network', 255)
            ->allowEmptyString('information_ds_network');

        $validator
            ->scalar('information_ds_software_version')
            ->maxLength('information_ds_software_version', 255)
            ->allowEmptyString('information_ds_software_version');

        $validator
            ->scalar('information_ds_operating_system_version')
            ->maxLength('information_ds_operating_system_version', 255)
            ->allowEmptyString('information_ds_operating_system_version');

        $validator
            ->scalar('information_note')
            ->maxLength('information_note', 255)
            ->allowEmptyString('information_note');

        $validator
            ->scalar('information_best')
            ->maxLength('information_best', 255)
            ->allowEmptyString('information_best');

        $validator
            ->decimal('ior_easy_write')
            ->allowEmptyString('ior_easy_write');

        $validator
            ->scalar('ior_easy_read')
            ->allowEmptyString('ior_easy_read');

        $validator
            ->scalar('ior_hard_write')
            ->allowEmptyString('ior_hard_write');

        $validator
            ->scalar('ior_hard_read')
            ->allowEmptyString('ior_hard_read');

        $validator
            ->scalar('mdtest_easy_write')
            ->allowEmptyString('mdtest_easy_write');

        $validator
            ->scalar('mdtest_easy_stat')
            ->allowEmptyString('mdtest_easy_stat');

        $validator
            ->scalar('mdtest_easy_delete')
            ->allowEmptyString('mdtest_easy_delete');

        $validator
            ->scalar('mdtest_hard_write')
            ->allowEmptyString('mdtest_hard_write');

        $validator
            ->scalar('mdtest_hard_read')
            ->allowEmptyString('mdtest_hard_read');

        $validator
            ->scalar('mdtest_hard_stat')
            ->allowEmptyString('mdtest_hard_stat');

        $validator
            ->scalar('mdtest_hard_delete')
            ->allowEmptyString('mdtest_hard_delete');

        $validator
            ->integer('find_easy')
            ->allowEmptyString('find_easy');

        $validator
            ->scalar('find_hard')
            ->allowEmptyString('find_hard');

        $validator
            ->scalar('marker_score')
            ->maxLength('marker_score', 255)
            ->allowEmptyString('marker_score');

        $validator
            ->scalar('marker_md')
            ->maxLength('marker_md', 255)
            ->allowEmptyString('marker_md');

        $validator
            ->scalar('storage_data')
            ->requirePresence('storage_data', 'create')
            ->notEmptyString('storage_data');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->date('valid_from')
            ->allowEmptyDate('valid_from');

        $validator
            ->date('valid_to')
            ->allowEmptyDate('valid_to');

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
        $rules->add($rules->existsIn(['release_id'], 'Releases'));

        return $rules;
    }
}
