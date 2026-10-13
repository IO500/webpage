<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
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
     * Submission fields that must never be exposed, selected, or downloadable.
     */
    public const PRIVATE_FIELDS = ['information_submitter'];

    /**
     * Only columns whose names begin with one of these prefixes are meaningful
     * for display and selection in the customize list. All other DB columns
     * (e.g. job_script*, storage_data, valid_from) are implicitly excluded.
     */
    public const DISPLAY_PREFIXES = ['information_', 'io500_', 'mdtest_', 'ior_', 'find_'];

    /**
     * Additional columns that do not match DISPLAY_PREFIXES but should still
     * be available as options in the customize list.
     */
    public const EXTRA_DISPLAY_FIELDS = ['id', 'release_id', 'status'];

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
     * The submission's best-scoring entry on a released list, or null when it is on
     * no released list (the Summary, Configuration and Reproducibility tabs then
     * redirect). Its score is the one the summary shows.
     *
     * @param \Cake\Datasource\EntityInterface $submission The submission.
     * @return \Cake\Datasource\EntityInterface|null The listings_submissions entry.
     */
    public function bestListing(EntityInterface $submission): ?EntityInterface
    {
        return $this->ListingsSubmissions->find()
            ->contain(['Listings' => ['Releases']])
            ->where([
                'ListingsSubmissions.submission_id' => $submission->id,
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->orderBy([
                'ListingsSubmissions.score' => 'DESC',
                'Listings.type_id' => 'DESC',
                'Releases.release_date' => 'DESC',
            ])
            ->first();
    }

    /**
     * Phase columns shown on the submission page, in display order.
     */
    public const PHASES = [
        'ior_easy_write', 'ior_easy_read', 'ior_hard_write', 'ior_hard_read',
        'mdtest_easy_write', 'mdtest_easy_stat', 'mdtest_easy_delete',
        'mdtest_hard_write', 'mdtest_hard_read', 'mdtest_hard_stat', 'mdtest_hard_delete',
        'find_mixed', 'ior_easy_read_random',
    ];

    /**
     * Every released, ranked list a submission is on, newest release first, with its
     * rank and entry count. Ranks are computed in SQL, comparing stored scores directly
     * (binding a FLOAT score from PHP rounds it to 14 digits and miscounts):
     * entries scoring higher, plus equal scores with a lower entry id.
     *
     * @param int $submissionId Submission id.
     * @return list<array{listing_id: int, release: string, type_id: int, type_name: string, type_url: string, type_position: int, rank: int, total: int}>
     */
    public function listMemberships(int $submissionId): array
    {
        $query = $this->ListingsSubmissions->find();
        $rows = $query
            ->select([
                'listing_id' => 'ListingsSubmissions.listing_id',
                'release_acronym' => 'Releases.acronym',
                'type_id' => 'Types.id',
                'type_name' => 'Types.name',
                'type_url' => 'Types.url',
                'type_position' => 'Types.position',
                'entry_rank' => $query->expr(
                    '(SELECT COUNT(*) FROM listings_submissions o'
                    . ' WHERE o.listing_id = ListingsSubmissions.listing_id'
                    . ' AND (o.score > ListingsSubmissions.score'
                    . ' OR (o.score = ListingsSubmissions.score AND o.id < ListingsSubmissions.id))) + 1',
                ),
                'entry_total' => $query->expr(
                    '(SELECT COUNT(*) FROM listings_submissions o WHERE o.listing_id = ListingsSubmissions.listing_id)',
                ),
            ])
            ->innerJoinWith('Listings.Releases')
            ->innerJoinWith('Listings.Types')
            ->where([
                'ListingsSubmissions.submission_id' => $submissionId,
                'Releases.release_date <=' => date('Y-m-d'),
                'Types.ranked' => true,
            ])
            ->orderBy(['Releases.release_date' => 'DESC', 'Types.position' => 'ASC'])
            ->disableHydration()
            ->toArray();

        return array_map(fn(array $r) => [
            'listing_id' => (int)$r['listing_id'],
            'release' => strtoupper($r['release_acronym']),
            'type_id' => (int)$r['type_id'],
            'type_name' => $r['type_name'],
            'type_url' => $r['type_url'],
            'type_position' => (int)$r['type_position'],
            'rank' => (int)$r['entry_rank'],
            'total' => (int)$r['entry_total'],
        ], $rows);
    }

    /**
     * The entries of one listing in rank order, with only the fields the submission
     * page compares: identity (for tooltips), bandwidth/metadata and the phase values.
     * The caller must check the listing is released.
     *
     * @param int $listingId Listing id.
     * @return list<array<string, mixed>>
     */
    public function comparisonData(int $listingId): array
    {
        $fields = [
            'submission_id' => 'ListingsSubmissions.submission_id',
            'system_name' => 'Submissions.information_system',
            'institution' => 'Submissions.information_institution',
            'bw' => 'Submissions.io500_bw',
            'md' => 'Submissions.io500_md',
        ];
        foreach (self::PHASES as $phase) {
            $fields[$phase] = 'Submissions.' . $phase;
        }
        $rows = $this->ListingsSubmissions->find()
            ->select($fields)
            ->innerJoinWith('Submissions')
            ->where(['ListingsSubmissions.listing_id' => $listingId])
            ->orderBy(['ListingsSubmissions.score' => 'DESC', 'ListingsSubmissions.id' => 'ASC'])
            ->disableHydration()
            ->toArray();

        $out = [];
        foreach ($rows as $i => $r) {
            $row = [
                'rank' => $i + 1,
                'submission_id' => (int)$r['submission_id'],
                'system' => trim((string)preg_replace('/\s+/', ' ', (string)$r['system_name'])),
                'institution' => trim((string)$r['institution']),
            ];
            foreach (['bw', 'md', ...self::PHASES] as $key) {
                $row[$key] = $r[$key] === null ? null : (float)$r[$key];
            }
            $out[] = $row;
        }

        return $out;
    }

    /**
     * Rank of a submission at every released list of one ranked type it is on, plus the
     * entries within three places of it at the latest of those releases. Ranks follow
     * list order (score, then entry id), so they match the list page.
     *
     * @param int $submissionId Submission id.
     * @param int $typeId List type id.
     * @param array|null $memberships listMemberships() output, when the caller already has it.
     * @return array{releases: list<string>, totals: list<int>, series: list<array<string, mixed>>}
     */
    public function positionHistory(int $submissionId, int $typeId, ?array $memberships = null): array
    {
        $listings = array_reverse(array_values(array_filter(
            $memberships ?? $this->listMemberships($submissionId),
            fn(array $m) => $m['type_id'] === $typeId,
        )));
        if (!$listings) {
            return ['releases' => [], 'totals' => [], 'series' => []];
        }

        // Rank of every entry, per listing.
        $entries = $this->ListingsSubmissions->find()
            ->select([
                'listing_id' => 'ListingsSubmissions.listing_id',
                'submission_id' => 'ListingsSubmissions.submission_id',
                'system_name' => 'Submissions.information_system',
                'institution' => 'Submissions.information_institution',
            ])
            ->innerJoinWith('Submissions')
            ->where(['ListingsSubmissions.listing_id IN' => array_column($listings, 'listing_id')])
            ->orderBy([
                'ListingsSubmissions.listing_id' => 'ASC',
                'ListingsSubmissions.score' => 'DESC',
                'ListingsSubmissions.id' => 'ASC',
            ])
            ->disableHydration()
            ->toArray();
        $ranks = [];
        $labels = [];
        foreach ($entries as $e) {
            $listingId = (int)$e['listing_id'];
            $ranks[$listingId][(int)$e['submission_id']] = count($ranks[$listingId] ?? []) + 1;
            $labels[(int)$e['submission_id']] = trim((string)preg_replace('/\s+/', ' ', (string)$e['system_name']))
                . ' · ' . trim((string)$e['institution']);
        }

        $latest = $ranks[end($listings)['listing_id']];
        $own = $latest[$submissionId];
        $ids = [$submissionId];
        foreach ($latest as $id => $rank) {
            if ($id !== $submissionId && abs($rank - $own) <= 3) {
                $ids[] = $id;
            }
        }

        $series = [];
        foreach ($ids as $id) {
            $series[] = [
                'submission_id' => $id,
                'label' => $labels[$id],
                'self' => $id === $submissionId,
                'ranks' => array_map(fn(array $l) => $ranks[$l['listing_id']][$id] ?? null, $listings),
            ];
        }

        return [
            'releases' => array_column($listings, 'release'),
            'totals' => array_column($listings, 'total'),
            'series' => $series,
        ];
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
