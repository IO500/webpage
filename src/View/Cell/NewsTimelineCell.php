<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * News page announcements: the hand-written entries plus one generated entry per
 * released list release that has no hand-written entry and is newer than the newest
 * one that does. Everything is merged by date and grouped by year.
 */
class NewsTimelineCell extends Cell
{
    /**
     * @param list<array{date: string, release: string|null, body: string}> $announcements Hand-written entries.
     * @return void
     */
    public function display(array $announcements): void
    {
        $written = array_map('strtoupper', array_filter(array_column($announcements, 'release')));

        $releases = $this->fetchTable('Releases')->find()
            ->where(['release_date <=' => date('Y-m-d')])
            ->orderBy(['release_date' => 'ASC'])
            ->all()
            ->toList();

        // Newest release that already has a hand-written entry, by database date.
        $cutoff = null;
        foreach ($releases as $release) {
            if (in_array(strtoupper($release->acronym), $written, true)) {
                $cutoff = $release->release_date;
            }
        }

        // Releases to generate, each with the release before it (for "new").
        $generate = [];
        foreach ($releases as $i => $release) {
            $newer = $cutoff === null || $release->release_date > $cutoff;
            if ($newer && !in_array(strtoupper($release->acronym), $written, true)) {
                $generate[] = [$release, $releases[$i - 1] ?? null];
            }
        }
        $ids = [];
        foreach ($generate as [$release, $previous]) {
            $ids[] = $release->id;
            if ($previous) {
                $ids[] = $previous->id;
            }
        }
        $winners = $this->fetchTable('Listings')->releaseWinners(array_values(array_unique($ids)));

        $items = [];
        foreach ($announcements as $entry) {
            $items[] = ['date' => $entry['date'], 'body' => $entry['body'], 'release' => null];
        }
        foreach ($generate as [$release, $previous]) {
            $before = [];
            foreach ($previous ? $winners[$previous->id]['lists'] : [] as $list) {
                $before[$list['url']] = $list;
            }
            $lists = [];
            foreach ($winners[$release->id]['lists'] as $list) {
                // New #1: a different submission from a different system than last time.
                $old = $before[$list['url']] ?? null;
                $list['new'] = $old !== null
                    && $old['submission_id'] !== $list['submission_id']
                    && strtolower($old['system'] . '|' . $old['institution'])
                        !== strtolower($list['system'] . '|' . $list['institution']);
                $lists[] = $list;
            }
            $items[] = [
                'date' => $release->release_date->format('Y-m-d'),
                'body' => null,
                'release' => [
                    'acronym' => strtoupper($release->acronym),
                    'slug' => strtolower($release->acronym),
                    'full' => $winners[$release->id]['full'],
                    'lists' => $lists,
                ],
            ];
        }

        usort($items, fn(array $a, array $b) => strcmp($b['date'], $a['date']));
        $years = [];
        foreach ($items as $item) {
            $years[substr($item['date'], 0, 4)][] = $item;
        }

        $this->set(compact('years'));
    }
}
