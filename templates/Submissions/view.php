<?php
/**
 * Submission summary: scores, system sheet, ranking history, results by phase compared
 * with one ranked list, rank over time and the bandwidth/metadata scatter. The charts
 * are drawn by webroot/js/submission-view.js from the JSON in #sv-data.
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submission $submission
 * @var \App\Model\Entity\Questionnaire|null $questionnaire
 * @var array $memberships Ranked lists the submission is on (SubmissionsTable::listMemberships()).
 * @var array|null $selected The membership compared against first.
 * @var array|null $comparison Comparison data for $selected (listing_id, entries, history).
 */
$this->assign('title', h($submission->information_system) . ' - Submission');
$this->Html->css('submission-view', ['block' => true]);
$this->Html->script('submission-view', ['block' => true]);

$squash = fn($v) => trim((string)preg_replace('/\s+/', ' ', (string)$v));
$fmt = fn($v) => $this->Number->format((float)$v, ['places' => 2, 'precision' => 2]);
$ordinal = fn(int $n) => $n . (in_array($n % 100, [11, 12, 13], true) ? 'th' : (['th', 'st', 'nd', 'rd'][$n % 10] ?? 'th'));
$filled = fn($v) => $v !== null && !in_array(strtolower($squash($v)), ['', 'na', 'n/a', 'none', '-', '0'], true);

// System sheet: only rows with a value.
$nodes = (int)$submission->information_client_nodes;
$ppn = $submission->information_client_procs_per_node;
$fs = $squash(($submission->information_filesystem_name ?: $submission->information_filesystem_type)
    . ' ' . $submission->information_filesystem_version);
$dsNodes = $submission->information_ds_nodes;
$dsType = $squash($submission->information_ds_storage_type);
$system = array_filter([
    __('Institution') => $squash($submission->information_institution),
    __('Storage vendor') => $squash($submission->information_storage_vendor),
    __('File system') => $fs,
    __('Storage capacity') => $squash($submission->information_storage_capacity),
    __('Client nodes') => $nodes ? $this->Number->format($nodes) . ($filled($ppn) ? ' × ' . $squash($ppn) . ' ' . __('procs') : '') : '',
    __('Data servers') => $filled($dsNodes) ? $squash($dsNodes) . ($filled($dsType) ? ' · ' . $dsType : '') : '',
    __('Interconnect') => $squash($submission->information_client_interconnect_type),
    __('Submitted') => $submission->information_submission_date
        ? $submission->information_submission_date->i18nFormat('d MMM yyyy') : '',
], $filled);

// Ranking history grid: one row per release (newest first), one column per list type.
$releases = array_values(array_unique(array_column($memberships, 'release')));
$types = [];
foreach ($memberships as $m) {
    $types[$m['type_id']] = ['name' => $m['type_name'], 'position' => $m['type_position']];
}
uasort($types, fn($a, $b) => $a['position'] <=> $b['position']);
$cell = [];
foreach ($memberships as $m) {
    $cell[$m['release']][$m['type_id']] = $m;
}

// Results by phase: [group, subtitle, unit, [[label, column], ...]].
$groups = [
    ['IOR', __('Bandwidth'), 'GiB/s', [
        [__('Easy write'), 'ior_easy_write'], [__('Easy read'), 'ior_easy_read'],
        [__('Hard write'), 'ior_hard_write'], [__('Hard read'), 'ior_hard_read'],
    ]],
    ['MDtest', __('Metadata'), 'kIOP/s', [
        [__('Easy write'), 'mdtest_easy_write'], [__('Easy stat'), 'mdtest_easy_stat'],
        [__('Easy delete'), 'mdtest_easy_delete'], [__('Hard write'), 'mdtest_hard_write'],
        [__('Hard read'), 'mdtest_hard_read'], [__('Hard stat'), 'mdtest_hard_stat'],
        [__('Hard delete'), 'mdtest_hard_delete'],
    ]],
    ['Find', '', 'kIOP/s', [[__('Find'), 'find_mixed']]],
    [__('Random reads'), '4 KiB', 'GiB/s', [[__('Throughput'), 'ior_easy_read_random']]],
];

// Values the script compares against each list.
$own = ['bw' => (float)$submission->io500_bw, 'md' => (float)$submission->io500_md];
foreach (\App\Model\Table\SubmissionsTable::PHASES as $phase) {
    $own[$phase] = (float)$submission->{$phase};
}
$data = [
    'own' => $own,
    'memberships' => $memberships,
    'comparison' => $comparison,
    'compareUrl' => $this->Url->build(['controller' => 'Submissions', 'action' => 'compare', $submission->id]) . '/',
    'listUrl' => $this->Url->build('/list/'),
];
?>
<div class="subview sp">

    <?php echo $this->element('submission_header', ['active' => 'summary']); ?>

    <div class="sp-scores">
        <div class="main"><div class="v"><?php echo $fmt($submission->io500_score) ?></div><div class="k"><?php echo __('IO500 score') ?></div></div>
        <div><div class="v"><?php echo $fmt($submission->io500_bw) ?><small>GiB/s</small></div><div class="k"><?php echo __('Bandwidth') ?></div></div>
        <div><div class="v"><?php echo $fmt($submission->io500_md) ?><small>kIOP/s</small></div><div class="k"><?php echo __('Metadata') ?></div></div>
    </div>

    <div class="sp-cols<?php echo $memberships ? '' : ' one' ?>">
        <div>
            <h3><?php echo __('System') ?></h3>
            <table class="sp-spec" id="sp-spec">
                <thead><tr><th><?php echo __('Component') ?></th><th class="n"><?php echo __('Detail') ?></th></tr></thead>
                <tbody>
                    <?php foreach ($system as $label => $value) : ?>
                        <tr><td class="k"><?php echo h($label) ?></td><td class="n"><?php echo h($value) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if ($memberships) : ?>
            <div>
                <h3><?php echo __('Ranking history') ?></h3>
                <div class="sp-scrollx">
                    <table class="sp-lists" id="sp-lists">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo __('Release') ?></th>
                                <?php foreach ($types as $type) : ?>
                                    <th scope="col" class="n"><?php echo h($type['name']) ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($releases as $release) : ?>
                                <tr>
                                    <th scope="row" class="rel"><?php echo h($release) ?></th>
                                    <?php foreach ($types as $typeId => $type) : ?>
                                        <?php $m = $cell[$release][$typeId] ?? null; ?>
                                        <?php if ($m) : ?>
                                            <td class="n"><button type="button" class="cell" data-listing="<?php echo $m['listing_id'] ?>" aria-label="<?php echo h(__('Compare with {0} {1}: ranked {2} of {3}', $release, $type['name'], $ordinal($m['rank']), $m['total'])) ?>"><b><?php echo $ordinal($m['rank']) ?></b><span> / <?php echo $m['total'] ?></span></button></td>
                                        <?php else : ?>
                                            <td class="n none">—</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p class="sp-more"><button type="button" id="sp-older" hidden></button><a id="sp-list-link" href="#"></a></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="sp-h2row">
        <h2><?php echo __('Results by phase') ?></h2>
        <?php if ($comparison) : ?>
            <span class="sp-key">
                <svg width="14" height="12" aria-hidden="true"><line x1="7" x2="7" y1="0" y2="12" stroke="#c8102e" stroke-width="2.5"/></svg><?php echo __('This system') ?>
                <svg width="14" height="12" aria-hidden="true"><path d="M7 3 l-4 6 h8z" fill="#555"/></svg><?php echo __('Median') ?>
                <svg width="14" height="12" aria-hidden="true"><line x1="7" x2="7" y1="2" y2="10" stroke="#8a9099"/></svg><?php echo __('Other entries') ?>
            </span>
        <?php endif; ?>
    </div>
    <table class="sp-res">
        <thead>
            <tr>
                <th><?php echo __('Phase') ?></th>
                <th class="n"><?php echo __('Result') ?></th>
                <th class="u"><?php echo __('Unit') ?></th>
                <th class="cmp" data-cmp-head></th>
                <th class="n"><?php echo $comparison ? __('Rank') : '' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as [$group, $subtitle, $unit, $rows]) : ?>
                <?php $rows = array_filter($rows, fn($r) => (float)$submission->{$r[1]} > 0); ?>
                <?php if (!$rows) {
                    continue;
                } ?>
                <tr class="g"><td colspan="5"><?php echo h($group) ?><em><?php echo h($subtitle) ?></em></td></tr>
                <?php foreach ($rows as [$label, $column]) : ?>
                    <tr>
                        <td class="ph"><?php echo h($label) ?></td>
                        <td class="n"><?php echo $fmt($submission->{$column}) ?></td>
                        <td class="u"><?php echo $unit ?></td>
                        <td class="s" data-col="<?php echo $column ?>" data-unit="<?php echo $unit ?>"></td>
                        <td class="rk" data-col="<?php echo $column ?>"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($comparison) : ?>
        <section id="sp-bump-section" hidden>
            <h2><?php echo __('Position over time') ?> <span class="sp-ctx" data-type></span></h2>
            <div class="sp-chart"><svg id="sp-bump" role="img"></svg></div>
        </section>

        <h2><?php echo __('Bandwidth vs. metadata') ?> <span class="sp-ctx" data-cmp></span></h2>
        <div class="sp-chart"><svg id="sp-scatter" role="img"></svg></div>
    <?php endif; ?>

    <div id="sp-tip" role="tooltip"></div>
    <script type="application/json" id="sv-data"><?php echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
</div>
