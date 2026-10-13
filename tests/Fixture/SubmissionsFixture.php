<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Submissions for the ranking tests. Submission 6 is the "Shaheen-like" entry
 * whose list score is stored as FLOAT 797.038025 (see ListingsSubmissionsFixture).
 */
class SubmissionsFixture extends TestFixture
{
    /**
     * Values for the columns the schema requires (NOT NULL without a default).
     *
     * @var array<string, mixed>
     */
    private const REQUIRED = [
        'ior_easy_read_random' => 0, 'find_mixed' => 0, 'repository_url' => '',
        'user_id' => '00000000-0000-0000-0000-000000000000',
        'result_tar' => '', 'result_tar_dir' => '', 'result_tar_size' => 0, 'result_tar_type' => '',
        'job_script' => '', 'job_script_dir' => '', 'job_script_size' => 0, 'job_script_type' => '',
        'job_output' => '', 'job_output_dir' => '', 'job_output_size' => 0, 'job_output_type' => '',
        'system_information' => '', 'system_information_dir' => '', 'system_information_size' => 0,
        'system_information_type' => '', 'status_old' => '',
        'information_client_sockets' => 2, 'information_client_interconnect_vendor' => '',
        'information_client_dpdk' => 0, 'information_client_interconnect_type' => 'InfiniBand',
        'information_client_spdk' => 0, 'information_client_model' => '',
        'information_client_interconnect_links' => 1, 'information_client_cores_per_socket' => 64,
        'information_client_volatile_memory_capacity' => '512 GB', 'information_client_clock' => '2.4 GHz',
        'information_client_architecture' => 'x86_64', 'information_client_interconnect_rdma' => 1,
    ];

    /**
     * @return void
     */
    public function init(): void
    {
        // [id, release_id, system, institution, filesystem_type, io500_score]
        $rows = [
            [1, 1, 'Alpha', 'Inst A', 'Lustre', 9000.0],
            [2, 1, 'Beta', 'Inst B', 'DAOS', 5000.0],
            [3, 1, 'Gamma', 'Inst C', 'Lustre', 3000.0],
            [4, 2, 'Delta', 'Inst D', 'WekaIO', 1000.0],
            [5, 2, 'Epsilon', 'Inst E', 'GPFS', 900.0],
            [6, 1, 'Shaheen-like', 'Inst F', 'Lustre', 797.038113],
            [7, 2, 'Eta', 'Inst G', 'BeeGFS', 600.0],
            [8, 2, 'Theta', 'Inst H', 'Lustre', 500.0],
            [9, 2, 'Iota', 'Inst I', 'Lustre', 500.0],
            [10, 3, 'Future', 'Inst J', 'Lustre', 99999.0],
            // No institution, as some older Full-list entries.
            [11, 2, 'Kappa', null, 'Lustre', 50.0],
        ];
        $this->records = [];
        foreach ($rows as [$id, $releaseId, $system, $institution, $fs, $score]) {
            $this->records[] = self::REQUIRED + [
                'id' => $id,
                'release_id' => $releaseId,
                'status_id' => 3,
                'information_system' => $system,
                'information_institution' => $institution,
                'information_storage_vendor' => 'Vendor ' . $id,
                'information_filesystem_type' => $fs,
                // Submission 7's file-system name repeats its vendor, as some real ones do.
                'information_filesystem_name' => $id === 7 ? 'Vendor 7 Store' : null,
                'information_client_nodes' => 10 * $id,
                'information_client_total_procs' => 160 * $id,
                // Submission 7 has no date, as some older submissions do.
                'information_submission_date' => $id === 7 ? null : '2023-11-01',
                'io500_score' => $score,
                'io500_bw' => $score / 10,
                'io500_md' => $score * 2,
                'ior_easy_write' => $score / 5,
                'ior_easy_read' => $score / 4,
                'ior_hard_write' => $score / 50,
                'ior_hard_read' => $score / 20,
                'mdtest_easy_write' => $score,
                'mdtest_easy_stat' => $score * 3,
                'mdtest_easy_delete' => $score * 1.5,
                'mdtest_hard_write' => $score / 2,
                'mdtest_hard_read' => $score * 1.2,
                'mdtest_hard_stat' => $score * 2.5,
                'mdtest_hard_delete' => $score / 1.5,
                'find_mixed' => $score * 4,
            ];
        }
        parent::init();
    }
}
