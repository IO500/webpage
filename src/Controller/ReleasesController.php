<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Filesystem\File;

/**
 * Releases Controller
 *
 * @property \App\Model\Table\ReleasesTable $Releases
 * @method \App\Model\Entity\Release[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReleasesController extends AppController
{
    /**
     * Lastest method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function latest()
    {
        $limit = 1000;

        // Define which is the latest list to display
        $list = 'SC19';

        $settings = [
            'order' => [
                'io500_score' => 'DESC',
            ],
        ];

        if ($this->request->getParam('?')['sort']) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $releases = $this->Releases->find('all')
            ->select([
                'Releases.id',
                'Releases.information_system',
                'Releases.information_institution',
                'Releases.information_system',
                'Releases.information_filesystem_type',
            ])
            ->where([
                'LOWER(Releases.information_list_name)' => strtolower($list),
                'Releases.information_10_node_challenge IS' => false,
                'Releases.status' => 'VALID',
            ])
            ->order([
                'Releases.io500_score' => 'DESC',
            ])
            ->limit($limit);

        $storages = [];
        $valid_records = [];

        // We need to remove duplicate entries from submissions of the same system
        foreach ($releases as $release) {
            $key = $release->information_institution . ' ' .
                $release->information_system . ' ' .
                $release->information_filesystem_type;

            if (!in_array($key, $storages)) {
                $storages[] = $key;
                $valid_records[] = $release->id;
            }
        }

        $limit = 20;

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.id IN' => $valid_records,
            ])
            ->limit($limit);

        $this->set('limit', $limit);
        $this->set('list', $list);
        $this->set('releases', $this->paginate($releases, $settings));
    }

    /**
     * Ten method
     *
     * @param string|null $list Release information_list_name.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function ten($list = null)
    {
        $limit = 1000;

        $settings = [
            'order' => [
                'io500_score' => 'DESC',
            ],
        ];

        if ($this->request->getParam('?')['sort']) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $releases = $this->Releases->find('all')
            ->select([
                'Releases.id',
                'Releases.information_institution',
                'Releases.information_system',
                'Releases.information_filesystem_type',
            ])
            ->where([
                'LOWER(Releases.information_list_name)' => strtolower($list),
                'Releases.status' => 'VALID',
                'Releases.information_client_nodes' => 10,
            ])
            ->order([
                'Releases.io500_score' => 'DESC',
            ])
            ->limit($limit);

        $storages = [];
        $valid_records = [];

        // We need to remove duplicate entries from submissions of the same system
        foreach ($releases as $release) {
            $key = $release->information_institution . ' ' .
                $release->information_system . ' ' .
                $release->information_filesystem_type;

            if (!in_array($key, $storages)) {
                $storages[] = $key;
                $valid_records[] = $release->id;
            }
        }

        $limit = 20;

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.id IN' => $valid_records,
            ])
            ->limit($limit);

        $this->set('limit', $limit);
        $this->set('releases', $this->paginate($releases, $settings));
    }

    /**
     * List method
     *
     * @param string|null $list Release information_list_name.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list($list = null)
    {
        $limit = 1000;

        $settings = [
            'order' => [
                'io500_score' => 'DESC',
            ],
        ];

        if ($this->request->getParam('?')['sort']) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $releases = $this->Releases->find('all')
            ->select([
                'Releases.id',
                'Releases.information_system',
                'Releases.information_institution',
                'Releases.information_system',
                'Releases.information_filesystem_type',
            ])
            ->where([
                'LOWER(Releases.information_list_name)' => strtolower($list),
                'Releases.information_10_node_challenge IS' => false,
                'Releases.status' => 'VALID',
            ])
            ->order([
                'Releases.io500_score' => 'DESC',
            ])
            ->limit($limit);

        $storages = [];
        $valid_records = [];

        // We need to remove duplicate entries from submissions of the same system
        foreach ($releases as $release) {
            $key = $release->information_institution . ' ' .
                $release->information_system . ' ' .
                $release->information_filesystem_type;

            if (!in_array($key, $storages)) {
                $storages[] = $key;
                $valid_records[] = $release->id;
            }
        }

        $limit = 20;

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.id IN' => $valid_records,
            ])
            ->limit($limit);

        $this->set('limit', $limit);
        $this->set('releases', $this->paginate($releases, $settings));
    }

    /**
     * Historical method
     *
     * @param string|null $list Release information_list_name.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function historical($list = null)
    {
        $limit = 20;

        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $index = array_search($list, $lists);
        $lists = array_slice($lists, 0, $index + 1);

        $settings = [
            'order' => [
                'io500_score' => 'DESC',
            ],
        ];

        if ($this->request->getParam('?')['sort']) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.information_list_name IN' => $lists,
            ])
            ->limit($limit);

        $this->set('limit', $limit);
        $this->set('releases', $this->paginate($releases, $settings));
    }

    /**
     * Full method
     *
     * @param string|null $list Release information_list_name.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function full($list = null)
    {
        $limit = 20;

        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $index = array_search($list, $lists);
        $lists = array_slice($lists, 0, $index + 1);

        $settings = [
            'order' => [
                'io500_score' => 'DESC',
            ],
        ];

        if ($this->request->getParam('?')['sort']) {
            $settings['sortWhitelist'][] = $this->request->getParam('?')['sort'];
        }

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.status' => 'VALID',
                'Releases.information_list_name IN' => $lists,
            ])
            ->limit($limit);

        $this->set('limit', $limit);
        $this->set('releases', $this->paginate($releases, $settings));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $releases = $this->paginate($this->Releases);

        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $this->set('lists', $lists);
        $this->set(compact('releases'));
    }

    /**
     * View method
     *
     * @param string|null $id Release id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prefix = '/home/jbez/jbez.io500.org/storage/';

        $release = $this->Releases->get($id, [
            'contain' => [],
        ]);

        $target_files = [
            'ior_easy_read',
            'ior_easy_write',
            'ior_hard_read',
            'ior_hard_write',
            'mdtest_easy_delete',
            'mdtest_easy_stat',
            'mdtest_easy_write',
            'mdtest_hard_delete',
            'mdtest_hard_stat',
            'mdtest_hard_write',
            'mdtest_hard_read',
            'result_summary',
        ];

        $selected_files = [];

        $dir_iterator = new \RecursiveDirectoryIterator(
            $prefix . $release->information_list_name . '/' . str_replace('.zip', '', $release->storage_data)
        );
        $iterator = new \RecursiveIteratorIterator($dir_iterator, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                foreach ($target_files as $target) {
                    if (
                        strpos($file->getPathname(), $target) !== false &&
                        strpos($file->getPathname(), '._') === false
                    ) {
                        $selected_files[] = $file->getPathname();
                    }
                }
            }
        }

        foreach ($selected_files as $file) {
            $file = new File($file);
            $submitted_files[$file->name()] = $file->read();
            $file->close();
        }

        ksort($submitted_files);

        $this->set('release', $release);
        $this->set('submitted_files', $submitted_files);
    }

    /**
     * Graphs method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function graphs()
    {
        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $releases = $this->Releases->find('all')
            ->where([
                'LOWER(Releases.information_list_name) IN' => $lists,
                'Releases.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('releases'));
    }

    /**
     * IOR method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function ior()
    {
        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $releases = $this->Releases->find('all')
            ->where([
                'LOWER(Releases.information_list_name) IN' => $lists,
                'Releases.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('releases'));
    }

    /**
     * MDtest method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function mdtest()
    {
        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $releases = $this->Releases->find('all')
            ->where([
                'LOWER(Releases.information_list_name) IN' => $lists,
                'Releases.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('releases'));
    }

    /**
     * Pfind method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function pfind()
    {
        $lists = [
            'sc17',
            'isc18',
            'sc18',
            'isc19',
            'sc19',
        ];

        $releases = $this->Releases->find('all')
            ->where([
                'LOWER(Releases.information_list_name) IN' => $lists,
                'Releases.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('releases'));
    }

    /**
     * Customize method
     *
     * @param string|null $hash Record hash.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customize($hash = null)
    {
        $limit = 20;

        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('releases');

        // Get columns list from table
        $columns = $tableSchema->columns();

        $display = [];

        $selected_fields = null;

        if ($this->request->is('post')) {
            $selected_to_display = $this->request->getData();

            foreach ($selected_to_display['custom-fields'] as $option) {
                if (strpos($option, '*') !== false) {
                    $group = explode('*', $option)[0];

                    foreach ($columns as $key => $column) {
                        if (strpos($column, $group) !== false) {
                            $display['custom-fields'][$column] = $column;
                        }
                    }
                } else {
                    $display['custom-fields'][$option] = $option;
                }
            }

            $selected_fields = json_encode($display);
        } else {
            $display = [
                'custom-fields' => [
                    'information_list_name',
                    'information_institution',
                    'information_system',
                    'information_storage_vendor',
                    'information_filesystem_type',
                    'information_client_nodes',
                    'information_client_total_procs',
                    'io500_score',
                    'io500_bw',
                    'io500_md',
                ],
            ];
        }

        $releases = $this->Releases->find('all')
            ->where([
                'Releases.information_list_name IS NOT' => null,
            ])
            ->order([
                'Releases.io500_score' => 'DESC',
            ])
            ->limit($limit);

        $options = [];

        $options['information_*'] = 'information_*';
        $options['io500_*'] = 'io500_*';
        $options['mdtest_*'] = 'mdtest_*';
        $options['ior_*'] = 'ior_*';
        $options['find_*'] = 'find_*';

        foreach ($columns as $key => $column) {
            $options[$column] = $column;
        }

        $this->set('limit', $limit);
        $this->set('options', $options);
        $this->set('display', $display);
        $this->set('selected_fields', $selected_fields);
        $this->set('releases', $this->paginate($releases));
    }
}
