<?php $this->assign('title', strtoupper($release->acronym) . ' - ' . $type->name . ' List'); ?>

<?php echo $this->element('call'); ?>

<div class="submissions index content">
    <div class="submissions-header">
        <h2><?php echo $type->name . ' ' . strtoupper($release->acronym); ?> List</h2>

        <div class="submissions-action">
            <?php
            echo $this->Html->link(_('Customize'), [
                'controller' => 'submissions',
                'action' => 'customize',
                strtolower($release->acronym),
                strtolower($type->url)
            ], [
                'class' => 'button'
            ]);

            echo $this->Html->link('Download', [
                'controller' => 'listings',
                'action' => 'download',
                strtolower($release->acronym),
                strtolower($type->url),
                '?' => $this->request->getQueryParams()
            ], [
                'class' => 'button-navigation'
            ]);
            ?>
        </div>
    </div>

    <div class="submissions-list-types">
        <?php
        foreach ($release->listings as $list) {
            // Compare with the listing being shown: on the home page the URL has no type.
            $state = $list->type->url === $type->url ? ' tab-active' : '';

            $icon = '<i class="bi ' . ($list->type->ranked ? 'bi-trophy' : 'bi-list-ul') . '" aria-hidden="true"></i> ';

            echo $this->Html->link($icon . '<b>' . $list->type->name . '</b>', [
                'controller' => 'listings',
                'action' => 'list',
                strtolower($release->acronym),
                strtolower($list->type->url)
            ], [
                'class' => 'tab' . $state,
                'escape' => false
            ]);
        }
        ?>
    </div>

    <div class="release-information">
        <?php echo $listing->description; ?>
    </div>

    <div class="table-responsive tb-list-wrap">
        <table class="tb tb-list">
            <thead>
                <tr>
                    <th rowspan="3" class="tb-id"><?php echo $this->Paginator->sort('score', '#') ?></th>
                    <th rowspan="3" class="tb-center"><?php echo _('BoF') ?></th>
                    <th colspan="4" class="tb-center">Information</th>
                    <th colspan="3" class="tb-center tb-group-start">IO500</th>
                    <th rowspan="3" class="tb-center"><?php echo _('Repro.') ?></th>
                </tr>
                <tr>
                    <th rowspan="2" class="tb-identity">
                        <?php echo $this->Paginator->sort('information_institution', _('Institution')) ?>
                        <span class="tb-identity-sub">
                            <?php echo $this->Paginator->sort('information_system', _('System')) ?>
                            &middot;
                            <?php echo $this->Paginator->sort('information_filesystem_type', _('FS Type')) ?>
                        </span>
                    </th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_storage_vendor', _('Storage Vendor')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_nodes', _('Client Nodes'), ['direction' => 'desc']) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_total_procs', _('Total Client Proc.'), ['direction' => 'desc']) ?></th>

                    <th rowspan="2" class="tb-number tb-score tb-group-start"><?php echo $this->Paginator->sort('score', _('Score'), ['direction' => 'desc']) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_bw', _('BW'), ['direction' => 'desc']) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_md', _('MD'), ['direction' => 'desc']) ?></th>
                </tr>
                <tr>
                    <th class="tb-center">(GiB/s)</th>
                    <th class="tb-center">(kIOP/s)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Podium medals only make sense while the list is in its
                // default score ranking; a custom sort makes row position
                // meaningless, so suppress them then.
                $sortParam = $this->request->getQuery('sort');
                $sortDir = strtolower((string)$this->request->getQuery('direction'));
                $rankedOrder = (empty($sortParam) || $sortParam === 'score') && $sortDir !== 'asc';

                foreach ($submissions as $i => $entry) {
                    $url = $this->Url->build([
                            'controller' => 'submissions',
                            'action' => 'view',
                            $entry->id
                        ]
                    );
                ?>
                <?php
                $rank = (($this->Paginator->current() - 1) * $limit) + ($i + 1);
                $rankClass = 'rank';
                if (!empty($type->ranked) && $rankedOrder && $rank <= 3) {
                    $rankClass .= ' rank-' . $rank;
                }
                ?>
                <tr>
                    <td class="tb-id">
                        <?php
                        echo $this->Html->link($rank, [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $entry->submission->id
                        ], [
                            'class' => $rankClass
                        ]);
                        ?>
                    </td>
                    <td class="tb-center">
                        <?php echo strtoupper($entry->submission->release->acronym); ?>
                    </td>
                    <td class="tb-identity">
                        <?php
                        // (string): some entries have no institution or system, and link() rejects null.
                        echo $this->Html->link((string)$entry->submission->information_institution, [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $entry->submission->id
                        ], [
                            'class' => 'identity-institution'
                        ]);
                        ?>
                        <span class="identity-meta">
                            <?php echo $this->Html->link((string)$entry->submission->information_system, [
                                'controller' => 'submissions',
                                'action' => 'view',
                                $entry->submission->id,
                            ], [
                                'class' => 'identity-system',
                            ]) ?>
                            <?php if (!empty($entry->submission->information_filesystem_type)) : ?>
                                <span class="fs-tag"><?php echo h($entry->submission->information_filesystem_type) ?></span>
                            <?php endif; ?>
                        </span>
                    </td>
                    <td><?php echo h($entry->submission->information_storage_vendor) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($entry->submission->information_client_nodes) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($entry->submission->information_client_total_procs) ?></td>

                    <td class="tb-number tb-metric tb-score tb-group-start"><?php echo $this->Number->format($entry->score, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number tb-metric"><?php echo $this->Number->format($entry->submission->io500_bw, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number tb-metric"><?php echo $this->Number->format($entry->submission->io500_md, ['places' => 2, 'precision' => 2]) ?></td>

                    <td class="tb-center">
                        <?php
                        if (isset($entry->submission->questionnaire->reproducibility_score)) {
                            echo $this->Html->link("<i class='badge badge-" . $entry->submission->questionnaire->reproducibility_score->id . "' data-tippy-content='" . $entry->submission->questionnaire->reproducibility_score->name . "'></i>", [
                                'controller' => 'questionnaires',
                                'action' => 'view',
                                $entry->submission->id
                            ], [
                                'escape' => false
                            ]);
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?php
            if ($this->Paginator->total() > 1) {
                echo $this->Paginator->first('<<');
                echo $this->Paginator->prev('<');
                echo $this->Paginator->numbers();
                echo $this->Paginator->next('>');
                echo $this->Paginator->last('>>');
            }
            ?>
        </ul>
    </div>

    <?php
    // Top-N parallel-coordinates comparison across the five dimensions,
    // each normalized to the strongest value among the systems shown.
    $PC_LIMIT = 10;
    $pcDimensions = [
        ['label' => 'Score',     'max' => 0.0],
        ['label' => 'Bandwidth', 'max' => 0.0],
        ['label' => 'Metadata',  'max' => 0.0],
        ['label' => 'Clients',   'max' => 0.0],
        ['label' => 'Processes', 'max' => 0.0],
    ];

    $pcSeries = [];
    foreach ($submissions as $i => $entry) {
        if ($i >= $PC_LIMIT) {
            break;
        }
        $pcSeries[] = [
            'rank' => (($this->Paginator->current() - 1) * $limit) + ($i + 1),
            'system' => $entry->submission->information_system,
            'institution' => $entry->submission->information_institution,
            'values' => [
                (float)$entry->score,
                (float)$entry->submission->io500_bw,
                (float)$entry->submission->io500_md,
                (float)$entry->submission->information_client_nodes,
                (float)$entry->submission->information_client_total_procs,
            ],
        ];
    }

    foreach ($pcSeries as $s) {
        foreach ($s['values'] as $d => $v) {
            $pcDimensions[$d]['max'] = max($pcDimensions[$d]['max'], $v);
        }
    }

    // SVG geometry (a viewBox keeps it fully responsive).
    $pcW = 1000;
    $pcH = 300;
    $pcPadL = 70;
    $pcPadR = 70;
    $pcTop = 55;
    $pcBottom = 270;
    $pcPlotW = $pcW - $pcPadL - $pcPadR;
    $pcPlotH = $pcBottom - $pcTop;
    $pcAxes = count($pcDimensions);
    $pcAxisX = function ($i) use ($pcPadL, $pcPlotW, $pcAxes) {
        return $pcAxes > 1 ? $pcPadL + $i * ($pcPlotW / ($pcAxes - 1)) : $pcPadL;
    };
    $pcValueY = function ($v, $max) use ($pcBottom, $pcPlotH) {
        $n = $max > 0 ? $v / $max : 0;
        return $pcBottom - $n * $pcPlotH;
    };
    $pcPalette = [
        '#d63b1e', '#ef8a3c', '#e0b400', '#7aa53f', '#2a9d8f',
        '#3f8fae', '#5566c9', '#8a5fc0', '#c0509e', '#9aa0a6',
    ];
    ?>

    <?php if (!empty($pcSeries)) : ?>
    <div class="plot-box">
        <h3 class="plot-title">Top <?php echo count($pcSeries); ?> systems compared</h3>
        <p class="plot-caption">Each axis is scaled to the highest value among these systems &mdash; 100% marks the leader on that dimension. Click a system below to toggle it.</p>

        <svg class="parcoords" viewBox="0 0 <?php echo $pcW; ?> <?php echo $pcH; ?>" preserveAspectRatio="xMidYMid meet" role="img" aria-label="Parallel-coordinates comparison of the top systems across five dimensions">
            <?php foreach ($pcDimensions as $d => $dim) : $x = round($pcAxisX($d), 1); ?>
                <line class="pc-axis" x1="<?php echo $x; ?>" y1="<?php echo $pcTop; ?>" x2="<?php echo $x; ?>" y2="<?php echo $pcBottom; ?>"></line>
                <text class="pc-axis-label" x="<?php echo $x; ?>" y="<?php echo $pcTop - 16; ?>" text-anchor="middle"><?php echo h($dim['label']); ?></text>
                <text class="pc-axis-cap" x="<?php echo $x; ?>" y="<?php echo $pcTop - 3; ?>" text-anchor="middle">100%</text>
            <?php endforeach; ?>

            <?php
            foreach ($pcSeries as $k => $s) :
                $color = $pcPalette[$k % count($pcPalette)];
                $pts = [];
                foreach ($s['values'] as $d => $v) {
                    $pts[] = round($pcAxisX($d), 1) . ',' . round($pcValueY($v, $pcDimensions[$d]['max']), 1);
                }
            ?>
                <g class="pc-series" data-series="<?php echo $k; ?>">
                    <polyline class="pc-line" points="<?php echo implode(' ', $pts); ?>" style="stroke: <?php echo $color; ?>">
                        <title>#<?php echo $s['rank']; ?> &mdash; <?php echo h($s['system']); ?> (<?php echo h($s['institution']); ?>)</title>
                    </polyline>
                    <?php foreach ($s['values'] as $d => $v) : ?>
                        <circle class="pc-dot" cx="<?php echo round($pcAxisX($d), 1); ?>" cy="<?php echo round($pcValueY($v, $pcDimensions[$d]['max']), 1); ?>" r="3.5" style="fill: <?php echo $color; ?>"></circle>
                    <?php endforeach; ?>
                </g>
            <?php endforeach; ?>
        </svg>

        <ul class="pc-legend">
            <?php foreach ($pcSeries as $k => $s) : $color = $pcPalette[$k % count($pcPalette)]; ?>
                <li data-series="<?php echo $k; ?>" role="button" tabindex="0" aria-pressed="true">
                    <span class="pc-swatch" style="background: <?php echo $color; ?>"></span>#<?php echo $s['rank']; ?> <?php echo h($s['system']); ?> <span class="pc-legend-inst"><?php echo h($s['institution']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script type="text/javascript">
tippy(document.querySelectorAll('.badge'));

// A click anywhere in a row opens the submission (links keep their own target).
document.querySelectorAll('.tb-list tbody tr').forEach(function (tr) {
    var link = tr.querySelector('a.identity-institution');
    if (!link) {
        return;
    }
    tr.addEventListener('click', function (e) {
        if (!e.target.closest('a')) {
            location.href = link.href;
        }
    });
});

// Toggle a system in/out of the parallel-coordinates plot from the legend.
document.querySelectorAll('.pc-legend li').forEach(function (item) {
    function toggle() {
        var series = document.querySelector('.pc-series[data-series="' + item.getAttribute('data-series') + '"]');
        if (!series) {
            return;
        }
        var hidden = series.classList.toggle('pc-hidden');
        item.classList.toggle('pc-legend-off', hidden);
        item.setAttribute('aria-pressed', String(!hidden));
    }

    item.addEventListener('click', toggle);
    item.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggle();
        }
    });
});
</script>
