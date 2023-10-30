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
        $submission = $this->Submissions->get($id);

        // We need to fetch the scores
        $score = $this->Submissions->ListingsSubmissions->find('all')
            ->contain([
                'Listings' => [
                    'Releases',
                ],
            ])
            ->where([
                'ListingsSubmissions.submission_id' => $submission->id,
                'Releases.release_date <=' => date('Y-m-d'),
            ])
            ->order([
                'ListingsSubmissions.score' => 'DESC',
                'Listings.type_id' => 'DESC',
                'Releases.release_date' => 'DESC',
            ])
            ->first();

        $submission->io500_score = $score->score;

        $questionnaire = $this->Submissions->Questionnaires->find('all')
            ->where([
                'Questionnaires.submission_id' => $submission->id
            ])
            ->first();

        $this->set('submission', $submission);
        $this->set('questionnaire', $questionnaire);
    }

    /**
     * Configuration method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function configuration($id = null)
    {
        $submission = $this->Submissions->get($id);

        $questionnaire = $this->Submissions->Questionnaires->find('all')
            ->where([
                'Questionnaires.submission_id' => $submission->id
            ])
            ->first();

        $this->set('submission', $submission);
        $this->set('questionnaire', $questionnaire);
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
     * @param null $bof Release acronym.
     * @param null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customize($bof = null, $url = null)
    {
        $limit = 1000;

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

        $release = $this->Submissions->Releases->find('all')
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

        $listing = $this->Submissions->ListingsSubmissions->Listings->find('all')
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

        $submissions = $this->Submissions->ListingsSubmissions->find('all')
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
            ])
            ->limit($limit);

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
                        if (is_numeric($submission->submission->{$column}) || is_string($submission->submission->{$column})) {
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

            $display['custom-remove'] = $selected_to_display['custom-remove'];

            $display['custom-release'] = $bof;
            $display['custom-list'] = $url;

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

        // Remove duplicate records
        $unique = [];

        if (isset($selected_to_display) && $selected_to_display['custom-remove']) {
            foreach ($submissions as $id => $submission) {
                $key = md5($submission['submission']['information_system'] . $submission['submission']['information_institution'] . $submission['submission']['information_filesystem_type']);

                if (in_array($key, $unique)) {
                    unset($submissions[$id]);
                } else {
                    $unique[] = $key;
                }
            }
        }

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
