<?php
declare(strict_types=1);

namespace App\Utility;

use HTMLPurifier;
use HTMLPurifier_Config;

/**
 * Turns a reproducibility questionnaire answer (HTML written by submitters in the
 * editor) into HTML that is safe to print on the page.
 */
class AnswerFormatter
{
    private static ?HTMLPurifier $purifier = null;

    /**
     * @param string|null $answer Answer HTML as stored.
     * @return string Safe HTML ('' for an empty answer).
     */
    public static function toHtml(?string $answer): string
    {
        if ($answer === null || trim($answer) === '') {
            return '';
        }

        // Text between ``` fences (often spread over editor paragraphs and <br>s)
        // becomes a code block, one line per line break.
        $answer = (string)preg_replace_callback('/```(.*?)```/s', function (array $m): string {
            $code = preg_replace('#<br\s*/?>|</p>\s*<p[^>]*>#i', "\n", $m[1]);
            $code = trim(strip_tags((string)$code), "\n\r");

            return '</p><pre><code>' . $code . '</code></pre><p>';
        }, $answer);

        $html = self::purifier()->purify($answer);

        // Editor leftovers: paragraphs holding only spaces or line breaks, and the
        // non-breaking spaces Word-style editors put at the start of a paragraph.
        $html = (string)preg_replace('#<p>(?:\s|\x{00A0}|&nbsp;|<br\s*/?>)*</p>#u', '', $html);
        $html = (string)preg_replace('#<p>(?:\s|\x{00A0}|&nbsp;)+#u', '<p>', $html);

        return trim($html);
    }

    /**
     * @return \HTMLPurifier
     */
    private static function purifier(): HTMLPurifier
    {
        if (self::$purifier === null) {
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.Allowed', 'p,br,ul,ol,li,strong,b,em,i,u,code,pre,blockquote,h4,h5,'
                . 'table,thead,tbody,tr,th,td,a[href]');
            $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true, 'mailto' => true]);
            $config->set('HTML.TargetBlank', true);
            $config->set('HTML.Nofollow', true);
            $config->set('AutoFormat.RemoveEmpty', true);
            $config->set('AutoFormat.Linkify', true);
            // No definition cache on disk: it would write into vendor/.
            $config->set('Cache.DefinitionImpl', null);
            self::$purifier = new HTMLPurifier($config);
        }

        return self::$purifier;
    }
}
