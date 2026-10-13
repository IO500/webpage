<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listings Model
 *
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\ReleasesTable&\Cake\ORM\Association\BelongsTo $Releases
 * @property \App\Model\Table\ListSc1810nodeTable&\Cake\ORM\Association\HasMany $ListSc1810node
 * @property \App\Model\Table\ListSc18Io500Table&\Cake\ORM\Association\HasMany $ListSc18Io500
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\BelongsToMany $Submissions
 * @method \App\Model\Entity\Listing newEmptyEntity()
 * @method \App\Model\Entity\Listing newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Listing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Listing get($primaryKey, $options = [])
 * @method \App\Model\Entity\Listing findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Listing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Listing[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Listing|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Listing saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ListingsTable extends Table
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

        $this->setTable('listings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Releases', [
            'foreignKey' => 'release_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ListingsSubmissions', [
            'foreignKey' => 'listing_id',
        ]);
        $this->belongsToMany('Submissions', [
            'foreignKey' => 'listing_id',
            'targetForeignKey' => 'submission_id',
            'joinTable' => 'listings_submissions',
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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn(['type_id'], 'Types'), ['errorField' => 'type_id']);
        $rules->add($rules->existsIn(['release_id'], 'Releases'), ['errorField' => 'release_id']);

        return $rules;
    }

    /**
     * For the News page: the #1 entry of each ranked list of the given releases, in
     * list-type order, and the number of entries on each release's Full list. #1 follows
     * the list page order (score, then entry id); lists without a scored entry are left out.
     *
     * @param list<int> $releaseIds Release ids.
     * @return array<int, array{full: int|null, lists: list<array{type: string, url: string, submission_id: int, system: string, institution: string, score: float}>}>
     */
    public function releaseWinners(array $releaseIds): array
    {
        if (!$releaseIds) {
            return [];
        }
        $listings = $this->find()
            ->contain(['Types'])
            ->where(['Listings.release_id IN' => $releaseIds])
            ->orderBy(['Types.position' => 'ASC'])
            ->all();

        $out = [];
        foreach ($releaseIds as $id) {
            $out[$id] = ['full' => null, 'lists' => []];
        }

        $fullIds = [];
        foreach ($listings as $listing) {
            if ($listing->type->url === 'full') {
                $fullIds[$listing->id] = $listing->release_id;
            }
            if (!$listing->type->ranked) {
                continue;
            }
            $top = $this->ListingsSubmissions->find()
                ->contain(['Submissions'])
                ->where(['ListingsSubmissions.listing_id' => $listing->id, 'ListingsSubmissions.score IS NOT' => null])
                ->orderBy(['ListingsSubmissions.score' => 'DESC', 'ListingsSubmissions.id' => 'ASC'])
                ->first();
            if (!$top || !$top->submission) {
                continue;
            }
            $out[$listing->release_id]['lists'][] = [
                'type' => $listing->type->name,
                'url' => $listing->type->url,
                'submission_id' => (int)$top->submission_id,
                'system' => trim((string)preg_replace('/\s+/', ' ', (string)$top->submission->information_system)),
                'institution' => trim(
                    (string)preg_replace('/\s+/', ' ', (string)$top->submission->information_institution),
                ),
                'score' => (float)$top->score,
            ];
        }

        if ($fullIds) {
            $counts = $this->ListingsSubmissions->find()
                ->select(['listing_id', 'entries' => $this->ListingsSubmissions->find()->func()->count('*')])
                ->where(['listing_id IN' => array_keys($fullIds)])
                ->groupBy('listing_id')
                ->disableHydration()
                ->all();
            foreach ($counts as $row) {
                $out[$fullIds[(int)$row['listing_id']]]['full'] = (int)$row['entries'];
            }
        }

        return $out;
    }
}
