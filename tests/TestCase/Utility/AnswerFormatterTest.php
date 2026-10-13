<?php
declare(strict_types=1);

namespace App\Test\TestCase\Utility;

use App\Utility\AnswerFormatter;
use PHPUnit\Framework\TestCase;

class AnswerFormatterTest extends TestCase
{
    public function testRemovesScriptsAndEventHandlers(): void
    {
        $html = AnswerFormatter::toHtml('<p>Deployed in <strong>2023</strong>.</p><script>alert("x")</script>'
            . '<p><a href="https://example.org" onclick="steal()">docs</a> <img src=x onerror="steal()"></p>');

        $this->assertStringContainsString('<strong>2023</strong>', $html);
        $this->assertStringNotContainsString('<script', $html);
        $this->assertStringNotContainsString('alert', $html);
        $this->assertStringNotContainsString('onclick', $html);
        $this->assertStringNotContainsString('onerror', $html);
        $this->assertStringNotContainsString('<img', $html);
    }

    public function testKeepsLinksListsAndOpensLinksSafely(): void
    {
        $html = AnswerFormatter::toHtml('<ul><li><a href="https://example.org/x">x</a></li></ul><p><a href="javascript:steal()">y</a></p>');

        $this->assertStringContainsString('<li>', $html);
        $this->assertStringContainsString('href="https://example.org/x"', $html);
        $this->assertMatchesRegularExpression('#rel="[^"]*nofollow[^"]*noopener#', $html);
        $this->assertStringNotContainsString('javascript:', $html);
    }

    /**
     * Answers often fence settings or commands with ``` across editor paragraphs.
     */
    public function testShowsFencedTextAsCode(): void
    {
        $html = AnswerFormatter::toHtml('<p>Client settings:</p><p>```<br>osc.max_dirty_mb=1024<br>llite.max_cached_mb=59392<br>```</p>');

        $this->assertStringContainsString("<pre><code>osc.max_dirty_mb=1024\nllite.max_cached_mb=59392</code></pre>", $html);
        $this->assertStringNotContainsString('```', $html);
    }

    public function testEmptyAnswer(): void
    {
        $this->assertSame('', AnswerFormatter::toHtml(null));
        $this->assertSame('', AnswerFormatter::toHtml('  '));
    }

    public function testLinksPlainUrlsAndDropsEmptyParagraphs(): void
    {
        $html = AnswerFormatter::toHtml('<p>Source on https://github.com/Cray/lustre</p><p><br></p><p>&nbsp;</p>');

        $this->assertStringContainsString('<a href="https://github.com/Cray/lustre"', $html);
        $this->assertStringNotContainsString('<p><br', $html);
        $this->assertStringNotContainsString('&nbsp;', $html);
    }

    /**
     * Word-style answers start paragraphs with a non-breaking space or hold nothing else.
     */
    public function testTrimsNonBreakingSpaces(): void
    {
        $html = AnswerFormatter::toHtml('<p><span lang="EN-US">&nbsp;</span><span lang="EN-US">OceanFS2 is new.</span></p>'
            . '<p><span>&nbsp;</span></p><p>&nbsp; &nbsp;</p><p>Last.</p>');

        $this->assertSame('<p>OceanFS2 is new.</p><p>Last.</p>', str_replace("\n", '', $html));
    }
}
