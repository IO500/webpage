<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Questionnaires for submission 6 (published) and 10 (unreleased). The answers are
 * editor HTML; one carries a script and an event handler that must never be output.
 */
class QuestionnairesFixture extends TestFixture
{
    /**
     * @return void
     */
    public function init(): void
    {
        $answers = [
            'system_purpose' => '<p>General academic research.</p>',
            'availability' => '<p>Deployed in <strong>2023</strong>.</p><script>alert("x")</script>',
            'storage_system_software' => '<p>See <a href="https://example.org/lustre" onclick="steal()">the docs</a>.</p>',
            'runtime_environment' => '<p>Client settings:</p><p>```<br>osc.max_dirty_mb=1024<br>```</p>',
            'fault_tolerance_mechanisms' => '<ul><li>Redundant power</li><li>RAID6</li></ul>',
            'execution' => '<p>Run via SLURM.</p>',
            'caching' => '<p>Page cache disabled.</p>',
            'data_source' => '<p>Standalone file system.</p>',
            'trust' => '<p>Runs were repeated.</p>',
            'feedback' => '',
            'reproducibility_score_id' => 4,
            'created' => '2023-11-01 00:00:00',
            'modified' => '2023-11-01 00:00:00',
        ];
        $this->records = [
            ['id' => 1, 'submission_id' => 6] + $answers,
            ['id' => 2, 'submission_id' => 10] + $answers,
        ];
        parent::init();
    }
}
