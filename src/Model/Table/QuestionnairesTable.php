<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionnaires Model
 *
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\BelongsTo $Submissions
 * @method \App\Model\Entity\Questionnaire newEmptyEntity()
 * @method \App\Model\Entity\Questionnaire newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionnaire findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Questionnaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionnaire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionnairesTable extends Table
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

        $this->setTable('questionnaires');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Submissions', [
            'foreignKey' => 'submission_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('ReproducibilityScores', [
            'foreignKey' => 'reproducibility_score_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('system_purpose')
            ->requirePresence('system_purpose', 'create')
            ->notEmptyString('system_purpose');

        $validator
            ->scalar('availability')
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');

        $validator
            ->scalar('storage_system_software')
            ->requirePresence('storage_system_software', 'create')
            ->notEmptyString('storage_system_software');

        $validator
            ->scalar('runtime_environment')
            ->requirePresence('runtime_environment', 'create')
            ->notEmptyString('runtime_environment');

        $validator
            ->scalar('fault_tolerance_mechanisms')
            ->requirePresence('fault_tolerance_mechanisms', 'create')
            ->notEmptyString('fault_tolerance_mechanisms');

        $validator
            ->scalar('execution')
            ->requirePresence('execution', 'create')
            ->notEmptyString('execution');

        $validator
            ->scalar('caching')
            ->requirePresence('caching', 'create')
            ->notEmptyString('caching');

        $validator
            ->scalar('data_source')
            ->requirePresence('data_source', 'create')
            ->notEmptyString('data_source');

        $validator
            ->scalar('trust')
            ->requirePresence('trust', 'create')
            ->notEmptyString('trust');

        $validator
            ->scalar('feedback')
            ->requirePresence('feedback', 'create')
            ->notEmptyString('feedback');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn(['submission_id'], 'Submissions'), ['errorField' => 'submission_id']);
        $rules->add($rules->existsIn(['reproducibility_score_id'], 'ReproducibilityScores'), ['errorField' => 'reproducibility_score_id']);

        return $rules;
    }
}
