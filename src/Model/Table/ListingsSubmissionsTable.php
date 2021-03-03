<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListingsSubmissions Model
 *
 * @property \App\Model\Table\ListingsTable&\Cake\ORM\Association\BelongsTo $Listings
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\BelongsTo $Submissions
 *
 * @method \App\Model\Entity\ListingsSubmission newEmptyEntity()
 * @method \App\Model\Entity\ListingsSubmission newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ListingsSubmission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListingsSubmission get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListingsSubmission findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ListingsSubmission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListingsSubmission[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListingsSubmission|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListingsSubmission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListingsSubmission[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ListingsSubmission[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ListingsSubmission[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ListingsSubmission[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ListingsSubmissionsTable extends Table
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

        $this->setTable('listings_submissions');

        $this->belongsTo('Listings', [
            'foreignKey' => 'listing_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Submissions', [
            'foreignKey' => 'submission_id',
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
            ->notEmptyString('id');

        $validator
            ->numeric('score')
            ->notEmptyString('score');

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
        $rules->add($rules->existsIn(['listing_id'], 'Listings'), ['errorField' => 'listing_id']);
        $rules->add($rules->existsIn(['submission_id'], 'Submissions'), ['errorField' => 'submission_id']);

        return $rules;
    }
}
