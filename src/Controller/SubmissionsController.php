<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Filesystem\File;
use NXP\Exception\IncorrectBracketsException;
use NXP\Exception\IncorrectExpressionException;
use NXP\Exception\UnknownOperatorException;
use NXP\Exception\UnknownVariableException;
use NXP\MathExecutor;

/**
 * Submissions Controller
 *
 * @property \App\Model\Table\SubmissionsTable $Submissions
 * @method \App\Model\Entity\Submission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *
 * This generates the different types of lists.  As described in 'about.php'
 * there are 4 main categories of lists:
 *
 * Historic list: all submissions ever received (function historical())
 * Full list: subset of Historic list that are currently valid (function full())
 * IO500 list: subset of Full list marked for inclusion in IO500 ranked list,
 *    showing one highest-scoring result per storage system (function latest())
 * 10-Node Challenge list: subset of Full list run on exactly 10 client nodes
 *    and marked for inclusion in the 10-Node Challenge ranked list, showing
 *    only one highest-scoring result per storage system (function ten())
 * Custom list: user-generated list with custom ranking (function customize())
 */
class SubmissionsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prefix = Configure::read('IO500.storage');

        $submission = $this->Submissions->get($id);

        // We need to fetch the scores
        $listing = $this->Submissions->ListingsSubmissions->Listings->find('all')
            ->contain([
                'Releases' => [
                    'Listings' => function ($query) {
                        return $query->where([
                            'Listings.type_id' => 4, // Historical List
                        ]);
                    },
                ],
            ])
            ->where([
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->order([
                'Releases.release_date' => 'DESC',
            ])
            ->first();

        $score = $this->Submissions->ListingsSubmissions->find('all')
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
            ])
            ->order([
                'ListingsSubmissions.score' => 'DESC',
            ])
            ->first();

        $submission->io500_score = $score->score;

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
            'result.txt',
            'result-summary.txt',
            'io500.sh',
        ];

        $selected_files = [];
        $submitted_files = [];

        $path = $prefix . $submission->information_list_name . '/' . str_replace('.zip', '', $submission->storage_data);

        if ($submission->storage_data && is_dir($path)) {
            $dir_iterator = new \RecursiveDirectoryIterator($path);
            $iterator = new \RecursiveIteratorIterator($dir_iterator, \RecursiveIteratorIterator::SELF_FIRST);

            foreach ($iterator as $file) {
                if ($file->isFile()) {
                    foreach ($target_files as $target) {
                        if (
                            (
                             strpos($file->getPathname(), $target) !== false ||
                             strpos(str_replace('_', '-', $file->getPathname()), str_replace('_', '-', $target)) !== false
                            ) &&
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
        }

        $this->set('submission', $submission);
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

        $submissions = $this->Submissions->find('all')
            ->where([
                'LOWER(Submissions.information_list_name) IN' => $lists,
                'Submissions.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('submissions'));
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

        $submissions = $this->Submissions->find('all')
            ->where([
                'LOWER(Submissions.information_list_name) IN' => $lists,
                'Submissions.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('submissions'));
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

        $submissions = $this->Submissions->find('all')
            ->where([
                'LOWER(Submissions.information_list_name) IN' => $lists,
                'Submissions.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('submissions'));
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

        $submissions = $this->Submissions->find('all')
            ->where([
                'LOWER(Submissions.information_list_name) IN' => $lists,
                'Submissions.status' => 'VALID',
            ]);

        $this->set('lists', $lists);
        $this->set(compact('submissions'));
    }

    /**
     * Customize method
     * Allows to create custom lists based on the last historical list available
     * We need to use the last historical list as the score it no longer stored in the submission
     *
     * @param string|null $hash Record hash.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customize($hash = null)
    {
        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

        // This column can be used to compute custom metrics, but it will take the initial value from the last historical list
        array_splice($columns, 8, 0, ['io500_score']);

        $display = [];

        $listing = $this->Submissions->ListingsSubmissions->Listings->find('all')
            ->contain([
                'Releases' => [
                    'Listings' => function ($query) {
                        return $query->where([
                            'Listings.type_id' => 4, // Historical List
                        ]);
                    },
                ],
            ])
            ->where([
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->order([
                'Releases.release_date' => 'DESC',
            ])
            ->first();

        $submissions = $this->Submissions->ListingsSubmissions->find('all')
            ->contain([
                'Submissions' => [
                    'Releases'
                ]
            ])
            ->where([
                'ListingsSubmissions.listing_id' => $listing->id,
                'Submissions.status IS NOT' => 'VALID-UPGRADE-FIXED', # TODO: this can be removed once those records are removed
            ])
            ->order([
                'ListingsSubmissions.score' => 'DESC',
            ]);

        $selected_fields = null;
        $equation = false;
        $valid = true;

        foreach ($submissions as $submission) {
            // We will use the latest valid score to display
            $submission->submission->io500_score = $submission->score;
            $submission->submission->information_list_name = $submission->submission->release->acronym;
        }

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

            if ($selected_to_display['custom-equation']) {
                $equation = true;

                $executor = new MathExecutor();

                foreach ($submissions as $submission) {
                    // We need to set all the variables available for calculation
                    foreach ($columns as $key => $column) {
                        if (is_numeric($submission->submission->{$column})) {
                            $executor->setVar($column, $submission->submission->{$column});
                        }
                    }

                    try {
                        $submission->submission->equation = $executor->execute($selected_to_display['custom-equation']);
                    } catch (IncorrectExpressionException $e) {
                        $valid = false;

                        $this->Flash->error(__('Sorry, but the expression is invalid! Please, make sure that your are using the correct syntax.'));

                        break;
                    } catch (IncorrectBracketsException $e) {
                        $valid = false;

                        $this->Flash->error(__('Sorry, but there are incorrect brackets! Please, make sure that your are using the correct syntax.'));

                        break;
                    } catch (UnknownOperatorException $e) {
                        $valid = false;

                        $this->Flash->error(__('Sorry, but the operator "{0}" is unknown! Please, make sure that your are using the correct syntax.', $e->getMessage()));

                        break;
                    } catch (UnknownVariableException $e) {
                        $valid = false;

                        $this->Flash->error(__('Sorry, but the variable "{0}" is unknown! Please, make sure that your are using the variable names.', $e->getMessage()));

                        break;
                    } catch (\Exception $e) {
                        $valid = false;

                        $this->Flash->error(__('Sorry, but there was an error when creating the custom list! Please, make sure you are using the correct variables and syntax.'));

                        break;
                    }
                }

                $display['custom-equation'] = $selected_to_display['custom-equation'];
                $display['custom-order'] = $selected_to_display['custom-order'];
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

        $options = [];

        $options['information_*'] = 'information_*';
        $options['io500_*'] = 'io500_*';
        $options['mdtest_*'] = 'mdtest_*';
        $options['ior_*'] = 'ior_*';
        $options['find_*'] = 'find_*';

        foreach ($columns as $key => $column) {
            $options[$column] = $column;
        }

        $submissions = $submissions->toArray();

        if ($equation) {
            // Sort by the result of the equation
            if ($selected_to_display['custom-order'] == 'DESC') {
                usort($submissions, function ($a, $b) {
                    return $a->submission->equation < $b->submission->equation;
                });
            } else {
                usort($submissions, function ($a, $b) {
                    return $a->submission->equation > $b->submission->equation;
                });
            }
        } else {
            // Sort by the IO500 score
            usort($submissions, function ($a, $b) {
                return $a->score < $b->score;
            });
        }

        $this->set('options', $options);
        $this->set('display', $display);
        $this->set('selected_fields', $selected_fields);
        $this->set('equation', $equation);
        $this->set('valid', $valid);
        $this->set('submissions', $submissions);
    }

    /**
     * Export method
     *
     * @return \Cake\Http\Response|null|void Downloads a CSV
     */
    public function export()
    {
        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

        $releases = $this->Submissions->Releases->find('all')
            ->where([
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->order([
                'Releases.release_date' => 'DESC',
            ]);

        $records = [];

        foreach ($releases as $release) {
            $submissions = $this->Submissions->find('all')
                ->where([
                    'Submissions.information_submission_date <=' => $release->release_date->format('Y-m-d'),
                    'Submissions.valid_from <=' => $release->release_date,
                    'OR' => [
                        'Submissions.valid_to IS NULL',
                        'Submissions.valid_to >=' => $release->release_date,
                    ],
                    'Submissions.status' => 'VALID',
                ])
                ->order([
                    'Submissions.io500_score' => 'DESC',
                ]);

            foreach ($submissions as $submission) {
                $submission['release_id'] = $release->acronym;
                $records[] = $submission;
            }
        }

        $this->set(compact('records'));
        $this->setResponse($this->getResponse()->withDownload('io500-full-list.csv'));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOptions([
                'header' => $columns,
                'serialize' => 'records',
            ]);
    }
}
