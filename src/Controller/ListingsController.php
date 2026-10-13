<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\SubmissionsTable;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListingsController extends AppController
{
    /**
     * Columns a list can be sorted by: the ones the table header links to. Anything
     * else in ?sort= is ignored (it reaches ORDER BY, and could also expose private
     * columns through their ordering).
     */
    private const SORTABLE_FIELDS = [
        'score',
        'information_institution',
        'information_system',
        'information_filesystem_type',
        'information_storage_vendor',
        'information_client_nodes',
        'information_client_total_procs',
        'io500_bw',
        'io500_md',
    ];

    /**
     * Drop non-string sort parameters (e.g. ?sort[]=x), which make the paginator fail.
     *
     * @param \Cake\Event\EventInterface $event The event.
     * @return void
     */
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $query = $this->request->getQueryParams();
        foreach (['sort', 'direction'] as $key) {
            if (isset($query[$key]) && !is_string($query[$key])) {
                unset($query[$key]);
            }
        }
        $this->request = $this->request->withQueryParams($query);
    }

    /**
     * List method
     *
     * @param string|null $bof Release acronym.
     * @param string|null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list(?string $bof = null, ?string $url = null)
    {
        $limit = Configure::read('IO500.pagination');

        if ($url === null) {
            $url = 'production';
        }
        // When the homepage route is hit (no $bof), serve the most recent BoF
        // that already has a published listing for the requested type. This
        // skips a release whose listing hasn't been built yet so the homepage
        // doesn't fall over between release-date and listing-creation.
        if ($bof === null) {
            $latest = $this->Listings->find('all')
                ->contain(['Types', 'Releases'])
                ->where([
                    'Types.url' => $url,
                    'Releases.release_date <=' => date('Y-m-d'),
                ])
                ->orderBy(['Releases.release_date' => 'DESC'])
                ->first();
            if ($latest === null) {
                throw new NotFoundException(
                    __('No published lists yet'),
                );
            }
            $bof = $latest->release->acronym;
        }

        $release = $this->Listings->Releases->find('all')
            ->contain([
                'Listings' => [
                    'Types',
                    'sort' => [
                        'Types.position' => 'ASC',
                    ],
                ],
            ])
            ->where([
                'Releases.release_date <=' => date('Y-m-d'),
                'Releases.acronym' => strtoupper($bof),
            ])
            ->first();

        $listing = $this->Listings->find('all')
            ->contain([
                'Types',
                'Releases',
            ])
            ->where([
                'Types.url' => $url,
                'Releases.release_date <=' => date('Y-m-d'),
                'Releases.acronym' => strtoupper($bof),
            ])
            ->first();

        $settings = [
            // Entry id breaks score ties, so the order (and the rank shown) is stable
            // and matches the ranks on the submission pages (SubmissionsTable::listMemberships()).
            'order' => [
                'score' => 'DESC',
                'ListingsSubmissions.id' => 'ASC',
            ],
            'limit' => $limit,
        ];

        $settings['sortableFields'] = self::SORTABLE_FIELDS;

        $submissions = $this->Listings->ListingsSubmissions->find('all')
            ->contain([
                'Submissions' => [
                    'Releases',
                    'Questionnaires' => [
                        'ReproducibilityScores',
                    ],
                ],
            ])
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
            ]);

        $this->set('limit', $limit);
        $this->set('type', $listing->type);
        $this->set('release', $release);
        $this->set('listing', $listing);
        $this->set('submissions', $this->paginate($submissions, $settings));
    }

    /**
     * Data feed for the client-side plotly charts under /submissions/{graphs,ior,mdtest,pfind}.
     *
     * Returns a JSON array of one row per ListingsSubmissions entry in the "io500"
     * Types listing across all released BoFs, with only the columns the 18 charts
     * in webroot/js/plots.js need (x-axis grouping, tooltip text, y-values).
     *
     * Adding a new release to the database is enough to make its data appear
     * in the plots — no script run, no commit of regenerated HTML.
     *
     * @return \Cake\Http\Response
     */
    public function plotsData(): Response
    {
        $rows = $this->Listings->ListingsSubmissions->find('all')
            ->contain([
                'Listings' => ['Types', 'Releases'],
                'Submissions',
            ])
            ->where([
                'Types.url' => 'io500',
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->orderBy([
                'Releases.release_date' => 'ASC',
                'ListingsSubmissions.score' => 'DESC',
            ])
            ->all();

        // Build a set of (submission_id, release_acronym) pairs that appear
        // in any production listing, so each io500 row can be tagged.
        $productionRows = $this->Listings->ListingsSubmissions->find('all')
            ->contain([
                'Listings' => ['Types', 'Releases'],
            ])
            ->where([
                'Types.url' => 'production',
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->all();
        $productionSet = [];
        foreach ($productionRows as $pr) {
            $productionSet[$pr->submission_id . '|' . $pr->listing->release->acronym] = true;
        }

        $payload = [];
        foreach ($rows as $ls) {
            $s = $ls->submission;
            $acronym = $ls->listing->release->acronym;
            $payload[] = [
                'list_name' => $acronym,
                'is_production' => isset($productionSet[$ls->submission_id . '|' . $acronym]),
                'information_system' => $s->information_system,
                'information_filesystem_type' => $s->information_filesystem_type,
                'information_institution' => $s->information_institution,
                'score' => $ls->score,
                'io500_bw' => $s->io500_bw,
                'io500_md' => $s->io500_md,
                'ior_easy_write' => $s->ior_easy_write,
                'ior_easy_read' => $s->ior_easy_read,
                'ior_hard_write' => $s->ior_hard_write,
                'ior_hard_read' => $s->ior_hard_read,
                'mdtest_easy_write' => $s->mdtest_easy_write,
                'mdtest_easy_stat' => $s->mdtest_easy_stat,
                'mdtest_easy_delete' => $s->mdtest_easy_delete,
                'mdtest_hard_write' => $s->mdtest_hard_write,
                'mdtest_hard_read' => $s->mdtest_hard_read,
                'mdtest_hard_stat' => $s->mdtest_hard_stat,
                'mdtest_hard_delete' => $s->mdtest_hard_delete,
                'find_easy' => $s->find_easy,
            ];
        }

        $this->autoRender = false;

        return $this->response
            ->withType('application/json')
            ->withHeader('Cache-Control', 'public, max-age=600')
            ->withStringBody(json_encode($payload));
    }

    /**
     * Download method
     *
     * @param string|null $bof Release acronym.
     * @param string|null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function download(?string $bof = null, ?string $url = null)
    {
        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table, excluding fields hidden from the entity
        // (e.g. PII) so the CSV header stays aligned with the serialized rows.
        $columns = array_values(array_diff(
            $tableSchema->columns(),
            SubmissionsTable::PRIVATE_FIELDS,
        ));

        // If empty $bof get the last released one
        if ($bof == null) {
            $release = $this->Listings->Releases->find('all')
                ->contain([
                    'Listings' => [
                        'Types',
                    ],
                ])
                ->where([
                    'Releases.release_date <=' => date('Y-m-d'),
                ])
                ->orderBy([
                    'Releases.release_date' => 'DESC',
                ])
                ->first();

            $bof = $release->acronym;
        }

        // If empty $url get the historical one
        if ($url == null) {
            $url = 'historical';
        }

        $listing = $this->Listings->find('all')
            ->contain([
                'Types',
                'Releases',
            ])
            ->where([
                'Types.url' => $url,
                'Releases.release_date <=' => date('Y-m-d'),
                'Releases.acronym' => strtoupper($bof),
            ])
            ->orderBy([
                'Releases.release_date' => 'DESC',
            ])
            ->first();

        $settings['sortableFields'] = self::SORTABLE_FIELDS;

        $submissions = $this->Listings->ListingsSubmissions->find('all')
            ->contain([
                'Submissions' => [
                    'Releases',
                ],
            ])
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
            ])
            ->orderBy([
                'ListingsSubmissions.score' => 'DESC',
            ]);

        $records = [];

        foreach ($submissions as $i => $submission) {
            // Modify the fields to export the CSV correctly
            $submission->submission->id = $i + 1;
            $submission->submission->score = $submission->score;
            $submission->submission->release_id = $submission->submission->release->acronym;

            unset($submission->submission->release);

            $records[] = $submission->submission;
        }

        $columns[] = 'score';

        $filename = implode('-', [
            'io500',
            strtolower($bof),
            strtolower($url),
        ]) . '.csv';

        $this->set(compact('records'));
        $this->setResponse($this->getResponse()->withDownload($filename));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOptions([
                'header' => $columns,
                'serialize' => 'records',
            ]);
    }
}
