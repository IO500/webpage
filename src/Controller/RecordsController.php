<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Ramsey\Uuid\Uuid;

/**
 * Records Controller
 *
 * @property \App\Model\Table\RecordsTable $Records
 * @method \App\Model\Entity\Record[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $records = $this->paginate($this->Records);

        $this->set(compact('records'));
    }

    /**
     * Save method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function save()
    {
        $record = $this->Records->newEmptyEntity();

        if ($this->request->is('post')) {
            $record = $this->Records->patchEntity($record, $this->request->getData());

            // Create a hash to be able to fetch that list and keep some privacy
            $record->hash = Uuid::uuid4();

            if ($this->Records->save($record)) {
                $this->Flash->success(__('The customized list has been saved.'));

                return $this->redirect(['controller' => 'records', 'action' => 'list', $record->hash]);
            }

            $this->Flash->error(__('The customized list could not be saved. Please, try again.'));
        }

        $this->set(compact('record'));
    }

    /**
     * List method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list($hash = null)
    {
        $limit = 20;

        $record = $this->Records->find('all')
            ->where([
                'Records.hash' => $hash
            ])
            ->first();

        // We need to load the Releases model to be able to fetch that table
        $this->loadModel('Releases');

        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('releases');
        
        // Get columns list from table
        $columns = $tableSchema->columns();

        // Decode the JSON with the field list into an associative array (true)
        $display = json_decode($record->fields, true);
        
        $releases = $this->Releases->find('all')
            ->where([
                'Releases.information_list_name IS NOT' => NULL
            ])
            ->order([
                'Releases.io500_score' => 'DESC'
            ])
            ->limit($limit);

        $options = [];

        $options[] = 'information_*';
        $options[] = 'io500_*';
        $options[] = 'mdtest_*';
        $options[] = 'ior_*';
        $options[] = 'find_*';

        foreach ($columns as $key => $column) {
            $options[$column] = $column;
        }

        $this->set('limit', $limit);
        $this->set('options', $options);
        $this->set('display', $display);
        $this->set('record', $record);
        $this->set('releases', $this->paginate($releases));
    }
}
