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
     * @param null $submission_id Questionnaire id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($submission_id = null)
    {
        $submission = $this->Questionnaires->Submissions->get($submission_id, [
            'contain' => [
                'Releases',
                'Questionnaires',
            ],
        ]);

        if (!$submission->questionnaire) {
            $this->Flash->error(__('This submission does not have a reproducibility questionnaire.'));

            return $this->redirect(['controller' => 'submissions', 'action' => 'view', $submission->id]);
        }

        $questionnaire = $this->Questionnaires->get($submission->questionnaire->id);

        if (date('Y-m-d') < $submission->release->release_date->i18nFormat('yyyy-MM-dd')) {
            $this->Flash->error(__('This submission belongs to a future unreleased list.'));
        }

        $this->set(compact('questionnaire', 'submission'));
    }
}
