<?php
declare(strict_types=1);

namespace App\Utility;

/**
 * Reads the few fields the News page shows from a single BibTeX entry.
 */
class Bibtex
{
    /**
     * @param string $bib One BibTeX entry.
     * @return array{title: string, authors: list<string>, venue: string, year: string, doi: string}
     */
    public static function parse(string $bib): array
    {
        $field = function (string $name) use ($bib): string {
            if (!preg_match('/\b' . $name . '\s*=\s*\{(.*?)\}\s*(?:,|\}?\s*$)/s', $bib, $m)) {
                return '';
            }

            return trim((string)preg_replace('/\s+/', ' ', $m[1]));
        };

        $authors = [];
        foreach (array_filter(preg_split('/\s+and\s+/', $field('author')) ?: []) as $name) {
            // "Last, First" becomes "First Last"; "First Last" stays as it is.
            $parts = array_map('trim', explode(',', $name, 2));
            $authors[] = count($parts) === 2 ? $parts[1] . ' ' . $parts[0] : $parts[0];
        }

        return [
            'title' => $field('title'),
            'authors' => $authors,
            'venue' => $field('booktitle') ?: ($field('journal') ?: $field('publisher')),
            'year' => $field('year'),
            'doi' => $field('doi'),
        ];
    }
}
