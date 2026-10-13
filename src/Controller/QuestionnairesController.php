<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Questionnaires Controller
 *
 * @property \App\Model\Table\QuestionnairesTable $Questionnaires
 * @method \App\Model\Entity\Questionnaire[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionnairesController extends AppController
{
    /**
     * View method
     *
     * @param string|null $submission_id Questionnaire id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $submission_id = null)
    {
        $submission = $this->Questionnaires->Submissions->get(
            $this->idFromUrl($submission_id),
            contain: ['Releases', 'Questionnaires'],
        );

        // Same gate as the summary: only submissions on a released list are shown.
        if (!$this->Questionnaires->Submissions->bestListing($submission)) {
            $this->Flash->error(__('This submission is not yet available.'));

            return $this->redirect('/');
        }

        if (!$submission->questionnaire) {
            $this->Flash->error(__('This submission does not have a reproducibility questionnaire.'));

            return $this->redirect(['controller' => 'submissions', 'action' => 'view', $submission->id]);
        }

        $questionnaire = $this->Questionnaires->get($submission->questionnaire->id, contain: ['ReproducibilityScores']);

        $this->set(compact('questionnaire', 'submission'));
    }
}
