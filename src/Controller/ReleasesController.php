<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Releases Controller
 *
 * @property \App\Model\Table\ReleasesTable $Releases
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReleasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $releases = $this->Releases->find('all')
            ->contain([
                'Listings' => [
                    'Types',
                ],
            ])
            ->where([
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->order([
                'Releases.release_date' => 'ASC',
            ]);

        $this->set(compact('releases'));
    }
}
