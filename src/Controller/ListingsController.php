<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;

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
            ])
            ->order([
                'ListingsSubmissions.score' => 'DESC',
            ]);

        $this->set('limit', $limit);
        $this->set('type', $listing->type);
        $this->set('release', $release);
        $this->set('submissions', $this->paginate($submissions, $settings));
    }
}
