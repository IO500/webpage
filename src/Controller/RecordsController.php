<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
use NXP\MathExecutor;
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
     * beforeFilter callback.
     *
     * @param \Cake\Event\EventInterface $event Event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(EventInterface $event)
    {
        if (!Configure::read('IO500.custom_lists')) {
            $this->Flash->error(__('Sorry, but this feature is not yet available!'));

            return $this->redirect(['controller' => 'submissions', 'action' => 'index']);
        }
    }

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
     * @param string|null $hash Record hash.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list($hash = null)
    {
        $record = $this->Records->find('all')
            ->where([
                'Records.hash' => $hash,
            ])
            ->first();

        // We need to load the Submissions model to be able to fetch that table
        $this->loadModel('Submissions');

        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

        // Decode the JSON with the field list into an associative array (true)
        $display = json_decode($record->fields, true);

        $submissions = $this->Submissions->find('all')
            ->where([
                'Submissions.information_list_name IS NOT' => null,
            ])
            ->order([
                'Submissions.io500_score' => 'DESC',
            ]);

        $equation = false;

        if (isset($display['custom-equation'])) {
            $equation = true;

            $executor = new MathExecutor();

            foreach ($submissions as $submission) {
                // We need to set all the variables available for calculation
                foreach ($columns as $key => $column) {
                    if (
                        strpos($column, 'io500_') !== false ||
                        strpos($column, 'mdtest_') !== false ||
                        strpos($column, 'ior_') !== false ||
                        strpos($column, 'find_') !== false
                    ) {
                        if (is_numeric($submission->{$column})) {
                            $executor->setVar($column, $submission->{$column});
                        }
                    }
                }

                $submission->equation = $executor->execute($display['custom-equation']);
            }
        }

        $options = [];

        $options[] = 'information_*';
        $options[] = 'io500_*';
        $options[] = 'mdtest_*';
        $options[] = 'ior_*';
        $options[] = 'find_*';

        foreach ($columns as $key => $column) {
            $options[$column] = $column;
        }

        $submissions = $submissions->toArray();

        if ($equation) {
            // Sort by the result of the equation
            if ($display['custom-order'] == 'DESC') {
                usort($submissions, function ($a, $b) {
                    return $a->equation < $b->equation;
                });
            } else {
                usort($submissions, function ($a, $b) {
                    return $a->equation > $b->equation;
                });
            }
        } else {
            // Sort by the IO500 score
            usort($submissions, function ($a, $b) {
                return $a->io500_score < $b->io500_score;
            });
        }

        $this->set('options', $options);
        $this->set('display', $display);
        $this->set('record', $record);
        $this->set('equation', $equation);
        $this->set('submissions', $submissions);
    }
}
