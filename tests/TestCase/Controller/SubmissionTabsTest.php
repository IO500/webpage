<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * The Configuration and Reproducibility tabs of a submission.
 */
class SubmissionTabsTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'app.Releases',
        'app.Types',
        'app.Listings',
        'app.Submissions',
        'app.ListingsSubmissions',
        'app.ReproducibilityScores',
        'app.Questionnaires',
    ];

    public function testConfigurationOfPublishedSubmission(): void
    {
        $this->get('/submissions/configuration/6');
        $this->assertResponseOk();
        $this->assertResponseContains('Shaheen-like');
    }

    public function testReproducibilityOfPublishedSubmission(): void
    {
        $this->get('/questionnaires/view/6');
        $this->assertResponseOk();
        $this->assertResponseContains('General academic research.');
        $this->assertResponseContains('<b>Fully Reproducible</b>');
        // The level links to its definition on The Lists page instead of repeating it.
        $this->assertResponseContains('the-lists#reproducibility-scores');
        $this->assertResponseNotContains('The highest level.');
        // Answers are cleaned: no scripts or event handlers from the submitter.
        $this->assertResponseNotContains('alert("x")');
        $this->assertResponseNotContains('steal()');
        $this->assertResponseContains('<pre><code>osc.max_dirty_mb=1024</code></pre>');
    }

    /**
     * Like the summary, the other tabs do not show submissions that are only on lists
     * of an unreleased release.
     */
    public function testTabsRedirectUnreleasedSubmission(): void
    {
        $this->get('/submissions/configuration/10');
        $this->assertRedirect('/');
        $this->get('/questionnaires/view/10');
        $this->assertRedirect('/');
    }

    /**
     * Missing or non-numeric ids are "not found", not server errors.
     */
    public function testInvalidIdsAreNotFound(): void
    {
        $urls = [
            '/submissions/view/abc', '/submissions/view', '/submissions/view/999',
            '/submissions/configuration/abc', '/submissions/configuration',
            '/questionnaires/view/abc', '/questionnaires/view',
            '/submissions/compare/abc/4',
        ];
        foreach ($urls as $url) {
            $this->get($url);
            $this->assertResponseCode(404, $url);
        }
    }
}
