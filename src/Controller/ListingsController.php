<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListingsController extends AppController
{
    /**
     * List method
     *
     * @param null $bof Release acronym.
     * @param null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list($bof = null, $url = null)
    {
        $limit = Configure::read('IO500.pagination');

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
            'order' => [
                'score' => 'DESC',
            ],
            'limit' => $limit,
        ];

        if (isset($this->request->getParam('?')['sort'])) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

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
    public function plotsData()
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
            ->order([
                'Releases.release_date' => 'ASC',
                'ListingsSubmissions.score' => 'DESC',
            ])
            ->all();

        $payload = [];
        foreach ($rows as $ls) {
            $s = $ls->submission;
            $payload[] = [
                'list_name' => $ls->listing->release->acronym,
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
     * @param null $bof Release acronym.
     * @param null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function download($bof = null, $url = null)
    {
        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

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
                ->order([
                    'Releases.release_date' => 'DESC',
                ])
                ->first();

            $bof = $release->acronym;
        } else {
            $release = $this->Listings->Releases->find('all')
                ->contain([
                    'Listings' => [
                        'Types',
                    ],
                ])
                ->where([
                    'Releases.release_date <=' => date('Y-m-d'),
                    'Releases.acronym' => strtoupper($bof),
                ])
                ->first();
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
            ->order([
                'Releases.release_date' => 'DESC',
            ])
            ->first();

        if (isset($this->request->getParam('?')['sort'])) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $submissions = $this->Listings->ListingsSubmissions->find('all')
            ->contain([
                'Submissions' => [
                    'Releases',
                ],
            ])
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
            ])
            ->order([
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
