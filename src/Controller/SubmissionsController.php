<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\SubmissionsTable;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Exception;
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
    public function view(?string $id = null)
    {
        $submission = $this->Submissions->get($this->idFromUrl($id), contain: ['Releases']);

        // The submission's best released list: gates unreleased submissions and gives
        // the score shown, as stored on the list (D2 in tasks/todo-submission-view.md).
        $best = $this->Submissions->bestListing($submission);

        if (!$best) {
            $this->Flash->error(__('This submission is not yet available.'));

            return $this->redirect('/');
        }

        $submission->io500_score = $best->score;

        $questionnaire = $this->Submissions->Questionnaires->find('all')
            ->contain(['ReproducibilityScores'])
            ->where([
                'Questionnaires.submission_id' => $submission->id,
            ])
            ->first();

        // Ranked lists this submission is on, and the one to compare against first:
        // ?list=<listing id> when it is one of them, otherwise the latest release's
        // Production list, otherwise the latest release's best-ranked list.
        $memberships = $this->Submissions->listMemberships((int)$submission->id);
        $selected = $this->defaultMembership($memberships, (int)$this->request->getQuery('list'));
        $comparison = $selected ? [
            'listing_id' => $selected['listing_id'],
            'entries' => $this->Submissions->comparisonData($selected['listing_id']),
            'history' => $this->Submissions->positionHistory((int)$submission->id, $selected['type_id'], $memberships),
        ] : null;

        $this->set(compact(
            'submission',
            'questionnaire',
            'memberships',
            'selected',
            'comparison',
        ));
    }

    /**
     * Comparison data for one ranked list the submission is on, loaded by the summary
     * page when another list is selected. 404 for any other listing (unreleased,
     * unranked, or not containing this submission).
     *
     * @param string|null $id Submission id.
     * @param string|null $listingId Listing id.
     * @return \Cake\Http\Response
     * @throws \Cake\Http\Exception\NotFoundException
     */
    public function compare(?string $id = null, ?string $listingId = null): Response
    {
        $id = $this->idFromUrl($id);
        $listingId = $this->idFromUrl($listingId);
        $memberships = $this->Submissions->listMemberships($id);
        $selected = current(array_filter(
            $memberships,
            fn(array $m) => $m['listing_id'] === $listingId,
        ));
        if (!$selected) {
            throw new NotFoundException();
        }

        $payload = [
            'listing_id' => $selected['listing_id'],
            'entries' => $this->Submissions->comparisonData($selected['listing_id']),
            'history' => $this->Submissions->positionHistory($id, $selected['type_id'], $memberships),
        ];
        $this->autoRender = false;

        return $this->response
            ->withType('application/json')
            ->withHeader('Cache-Control', 'public, max-age=600')
            ->withStringBody((string)json_encode($payload));
    }

    /**
     * Pick the list to compare against first.
     *
     * @param array $memberships Output of SubmissionsTable::listMemberships() (newest first).
     * @param int $requested Listing id from ?list=, or 0.
     * @return array|null
     */
    private function defaultMembership(array $memberships, int $requested): ?array
    {
        if (!$memberships) {
            return null;
        }
        foreach ($memberships as $m) {
            if ($m['listing_id'] === $requested) {
                return $m;
            }
        }
        $latest = array_filter($memberships, fn(array $m) => $m['release'] === $memberships[0]['release']);
        foreach ($latest as $m) {
            if ($m['type_url'] === 'production') {
                return $m;
            }
        }
        usort($latest, fn(array $a, array $b) => $a['rank'] / $a['total'] <=> $b['rank'] / $b['total']);

        return $latest[0];
    }

    /**
     * Configuration method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function configuration(?string $id = null)
    {
        $submission = $this->Submissions->get($this->idFromUrl($id), contain: ['Releases']);

        // Same gate as view(): only submissions on a released list are shown.
        if (!$this->Submissions->bestListing($submission)) {
            $this->Flash->error(__('This submission is not yet available.'));

            return $this->redirect('/');
        }

        $questionnaire = $this->Submissions->Questionnaires->find('all')
            ->contain(['ReproducibilityScores'])
            ->where([
                'Questionnaires.submission_id' => $submission->id,
            ])
            ->first();

        $this->set(compact('submission', 'questionnaire'));
    }

    /**
     * Graphs method. View-only — data is fetched client-side from /plots/data.json
     * by webroot/js/plots.js. See templates/Submissions/graphs.php.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function graphs()
    {
    }

    /**
     * IOR method. View-only — data is fetched client-side from /plots/data.json.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function ior()
    {
    }

    /**
     * MDtest method. View-only — data is fetched client-side from /plots/data.json.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function mdtest()
    {
    }

    /**
     * Pfind method. View-only — data is fetched client-side from /plots/data.json.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function pfind()
    {
    }

    /**
     * Customize method
     * Allows to create custom lists based on the last historical list available
     * We need to use the last historical list as the score it no longer stored in the submission
     *
     * @param string|null $bof Release acronym.
     * @param string|null $url Type url.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customize(?string $bof = null, ?string $url = null)
    {
        $limit = 1000;

        $db = ConnectionManager::get('default');

        // Create a schema collection.
        $collection = $db->getSchemaCollection();

        // Get a single table (instance of Schema\TableSchema)
        $tableSchema = $collection->describe('submissions');

        // Get columns list from table
        $columns = $tableSchema->columns();

        // Remove private fields to prevent them from being exposed, selected, or used in equations
        $columns = array_values(array_diff($columns, SubmissionsTable::PRIVATE_FIELDS));

        // This column can be used to compute custom metrics, but it will take the initial value from the last historical list
        array_splice($columns, 8, 0, ['io500_score']);

        $display = [];

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
            ->orderBy([
                'ListingsSubmissions.score' => 'DESC',
            ])
            ->limit($limit);

        $selected_fields = null;
        $equation = false;
        $valid = true;

        $displayPrefixes = SubmissionsTable::DISPLAY_PREFIXES;
        $extraDisplayFields = SubmissionsTable::EXTRA_DISPLAY_FIELDS;

        foreach ($submissions as $submission) {
            // We will use the latest valid score to display
            $submission->submission->io500_score = $submission->score;
            $submission->submission->information_list_name = $submission->submission->release->acronym;
        }

        if ($this->request->is('post')) {
            $selected_to_display = $this->request->getData();

            // Restrict selected fields to known display prefixes/fields and exclude private fields
            $selected_to_display['custom-fields'] = array_values(array_filter(
                array_diff($selected_to_display['custom-fields'], SubmissionsTable::PRIVATE_FIELDS),
                function ($field) use ($displayPrefixes, $extraDisplayFields) {
                    // Allow wildcard group options (e.g. "information_*")
                    if (str_ends_with($field, '*')) {
                        $prefix = substr($field, 0, -1);

                        return in_array($prefix, $displayPrefixes, true);
                    }
                    foreach ($displayPrefixes as $prefix) {
                        if (str_starts_with($field, $prefix)) {
                            return true;
                        }
                    }

                    return in_array($field, $extraDisplayFields, true);
                },
            ));

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
                        $value = $submission->submission->{$column};
                        if (is_numeric($value) || is_string($value)) {
                            $executor->setVar($column, $value);
                        }
                    }

                    try {
                        $submission->submission->equation = $executor->execute($selected_to_display['custom-equation']);
                    } catch (IncorrectExpressionException $e) {
                        $valid = false;

                        $this->Flash->error(__(
                            'Sorry, but the expression is invalid! '
                            . 'Please, make sure that your are using the correct syntax.',
                        ));

                        break;
                    } catch (IncorrectBracketsException $e) {
                        $valid = false;

                        $this->Flash->error(__(
                            'Sorry, but there are incorrect brackets! '
                            . 'Please, make sure that your are using the correct syntax.',
                        ));

                        break;
                    } catch (UnknownOperatorException $e) {
                        $valid = false;

                        $this->Flash->error(__(
                            'Sorry, but the operator "{0}" is unknown! '
                            . 'Please, make sure that your are using the correct syntax.',
                            $e->getMessage(),
                        ));

                        break;
                    } catch (UnknownVariableException $e) {
                        $valid = false;

                        $this->Flash->error(__(
                            'Sorry, but the variable "{0}" is unknown! '
                            . 'Please, make sure that your are using the variable names.',
                            $e->getMessage(),
                        ));

                        break;
                    } catch (Exception $e) {
                        $valid = false;

                        $this->Flash->error(__(
                            'Sorry, but there was an error when creating the custom list! '
                            . 'Please, make sure you are using the correct variables and syntax.',
                        ));

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

        foreach ($columns as $column) {
            $matchesPrefix = false;
            foreach ($displayPrefixes as $prefix) {
                if (str_starts_with($column, $prefix)) {
                    $matchesPrefix = true;
                    break;
                }
            }
            if ($matchesPrefix || in_array($column, $extraDisplayFields, true)) {
                $options[$column] = $column;
            }
        }

        $submissions = $submissions->toArray();

        // Remove duplicate records
        $unique = [];

        if (isset($selected_to_display) && $selected_to_display['custom-remove']) {
            foreach ($submissions as $id => $submission) {
                $key = md5($submission['submission']['information_system']
                    . $submission['submission']['information_institution']
                    . $submission['submission']['information_filesystem_type']);

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
}
