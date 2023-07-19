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
                    'sort'=> [
                        'Types.position' => 'ASC'
                    ]
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
     * Download method
     *
     * @param null $bof Release acronym.
     * @param null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function download($bof = null, $url = null)
    {
        $limit = Configure::read('IO500.pagination');

        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

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
                ],
            ])
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
            ]);

        $submissions = $this->paginate($submissions, $settings);

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
