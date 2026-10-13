<?php
/**
 * News: announcements, press, talks, publications and other public discussion.
 * The content lives in the arrays below; edit them to add news.
 *
 * Announcements that publish a release's lists name that release ('release' => 'SC23').
 *
 * @var \App\View\AppView $this
 */
$this->assign('title', 'News');
$this->Html->css('news', ['block' => true]);

$announcements = [
    ['date' => '2026-09-30', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_sc26'], ['class' => 'link'])
            . ' for the next IO500 list at SC 2026 is sent out.'],
    ['date' => '2026-05-06', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_isc26'], ['class' => 'link'])
            . ' for the next IO500 list at ISC 2026 is sent out.'],
    ['date' => '2025-10-01', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_sc25'], ['class' => 'link'])
            . ' for the seventeenth IO500 list at SC 2025 is sent out.'],
    ['date' => '2025-05-01', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_isc25'], ['class' => 'link'])
            . ' for the sixteenth IO500 list at ISC 2025 is sent out.'],
    ['date' => '2024-09-12', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_sc24'], ['class' => 'link'])
            . ' for the fifteenth IO500 list at SC 2024 has been released!'],
    ['date' => '2024-03-30', 'release' => null, 'body' => 'The '
            . $this->Html->link(__('Call for Submissions'), ['controller' => 'pages', 'action' => 'display', 'cfs_isc24'], ['class' => 'link'])
            . ' for the fourteenth IO500 list at ISC 2024 is sent out.'],
    ['date' => '2023-11-15', 'release' => 'SC23', 'body' => 'The thirteenth IO500 lists are published at SC\'23. <ul> <li> Congratulations to Argonne National Laboratory for their Aurora DAOS submission that took over the #1 spot on the Production list, and also the "10 Node Challenge Production" list. Pengcheng Laboratory and their Cloudbrain-II system using MadFS maintained the #1 Research spot, while JNIST and HUST PDSL maintained the #1 spot on the "10 Node Challenge Research" list with OceanFS2. </li> </ul>'],
    ['date' => '2023-05-24', 'release' => 'ISC23', 'body' => 'The twelfth IO500 lists are published at ISC\'23. <ul> <li> Congratulations to LRZ for their SuperMUC-NG DAOS submission that had #1 spot on the innaugural Production list, and also the "10 Node Challenge Production" list. Pengcheng Laboratory and their Cloudbrain-II system using MadFS maintained the #1 Research spot, while JNIST and HUST PDSL took over the #1 spot on the "10 Node Challenge Research" list with OceanFS2. </li> </ul>'],
    ['date' => '2022-11-15', 'release' => 'SC22', 'body' => 'The eleventh IO500 lists are published at SC\'22. <ul> <li> Congratulations again to Pengcheng Laboratory for their Cloudbrain-II system using MadFS, which maintained the #1 overall spot, while Argonne National Laboratory debut a new DAOS system for their Aurora cluster in the #2 spot. Sugon Cloud Storage Laboratory maintained the #1 spot on the "10 Node Challenge" list. </li> </ul>'],
    ['date' => '2022-05-30', 'release' => 'ISC22', 'body' => 'The tenth IO500 list is published at ISC\'22. <ul> <li> Congratulations again to Pengcheng Laboratory for their Cloudbrain-II system using MadFS, which maintained the #1 overall spot. The Sugon Cloud Storage Laboratory won the "10 Node Challenge". </li> </ul>'],
    ['date' => '2021-11-18', 'release' => 'SC21', 'body' => 'The ninth IO500 list is published at SC\'21. <ul> <li> Congratulations again to Pengcheng Laboratory for their Cloudbrain-II system using MadFS, which maintained the #1 overall spot and also won the "10 Node Challenge", and to Huawei with new systems in second and third place. </li> </ul>'],
    ['date' => '2021-07-01', 'release' => 'ISC21', 'body' => 'The eighth IO500 list is published at ISC\'21. <ul> <li> Congratulations to Pengcheng Laboratory for their Cloudbrain-II system using MadFS, which maintained the #1 overall spot and also won the "10 Node Challenge". </li> </ul>'],
    ['date' => '2021-04-14', 'release' => null, 'body' => $this->Html->link(__('Press Release for April 14, 2021'), ['controller' => 'pages', 'action' => 'display', 'news-20210414'], ['class' => 'link'])
            . '.'],
    ['date' => '2020-11-18', 'release' => 'SC20', 'body' => 'The seventh IO500 list is published at SC\'20.'],
    ['date' => '2020-07-23', 'release' => 'ISC20', 'body' => 'The sixth IO500 list is published at ISC\'20.'],
    ['date' => '2019-11-19', 'release' => 'SC19', 'body' => 'The fifth IO500 list is published at SC\'19.'],
    ['date' => '2019-06-23', 'release' => 'ISC19', 'body' => 'The fourth IO500 list is published at ISC\'19.'],
    ['date' => '2018-11-14', 'release' => 'SC18', 'body' => 'The third IO500 list is published. <ul> <li> Congrats to ORNL for their Summit machine which took over the #1 overall spot and also won the "10 Node Challenge". </li> <li> A total of 54 new submissions from 19 different institutions! </li> </ul>'],
    ['date' => '2018-06-28', 'release' => 'ISC18', 'body' => 'The second IO500 list is published. Congrats again to Oakforest-PACS.'],
    ['date' => '2017-11-15', 'release' => 'SC17', 'body' => 'The first IO500 list is published. We congratulate Oakforest-PACS for their winning submission.'],
];
$press = [
    ['date' => '2025-11-25', 'url' => 'https://www.storagenewsletter.com/2025/11/25/sc25-the-io500-lists-show-interesting-results-as-usual/', 'title' => 'SC25: The IO500 Lists Show Interesting Results as Usual'],
    ['date' => '2021-11-18', 'url' => 'https://e.huawei.com/en/news/ebg/2021/huawei-oceanstor-pacific-storage-takes-second-io500-list', 'title' => 'Huawei OceanStor Pacific Storage Takes Second Place in the IO500 List'],
    ['date' => '2021-08-07', 'url' => 'https://cloud.google.com/blog/topics/hpc/google-cloud-ranks-on-io500-benchmark-with-lustre', 'title' => 'Scaling data access to 10Tbps (yes, terabits) with Lustre'],
    ['date' => '2021-07-07', 'url' => 'https://www.hpcwire.com/2021/07/07/pengchen-labs-madfs-and-intels-daos-shine-in-latest-io500', 'title' => 'Pengchen Lab\'s MadFS and Intel\'s DAOS Shine in Latest IO500'],
    ['date' => '2021-07-06', 'url' => 'https://www.hpcwire.com/off-the-wire/4-rsc-storage-systems-represent-russia-in-global-io500-rating', 'title' => '4 RSC Storage Systems Represent Russia in Global IO500 Rating'],
    ['date' => '2020-11-19', 'url' => 'https://www.hpcwire.com/off-the-wire/three-rsc-supercomputers-represent-russia-in-global-io500-rating', 'title' => 'Three RSC Supercomputers Represent Russia in Global IO500 Rating'],
    ['date' => '2020-08-11', 'url' => 'https://www.hpcwire.com/2020/08/11/intels-optane-daos-tops-latest-io500/', 'title' => 'Intel\'s Optane/DAOS Solution Tops Latest IO500'],
    ['date' => '2020-07-31', 'url' => 'http://r.sib-thinkparq.com/mk/mr/viWS5JF2TimqIJf0fp4QtrOdOczUOgyIm3aA55sjNPc-CXS50xUer6nSU7T_ZpPhePCtm5Ra61VsXiIBF1vvfGJAxri0TLWnYXFxfkY', 'title' => 'BeeGFS Newsletter announces their position in IO500'],
    ['date' => '2020-07-23', 'url' => 'https://www.suse.com/c/ses-best_ceph_arm_benchmarkenterprise-storage-delivers-best-cephfs-benchmark-on-arm/', 'title' => 'SUSE Enterprise Storage delivers best CephFS benchmark on Arm'],
    ['date' => '2019-11-29', 'url' => 'https://storagenewsletter.com/2019/11/29/sc19-virtual-institute-for-i-o-ranking-combination-of-system-institution-file-system/', 'title' => 'Storage newsletter: SC19: Virtual Institute for I/O Ranking Combination of System/Institution/File System'],
    ['date' => '2019-11-19', 'url' => 'https://www.suse.com/c/suse-andthe-io500-sc19/', 'title' => 'SUSE and the IO500 @ SC19'],
    ['date' => '2019-06-19', 'url' => 'https://www.hpcwire.com/off-the-wire/ddn-selected-for-top-position-and-places-five-systems-in-top-ten-of-the-io500-10-node-benchmark/', 'title' => 'DDN Selected for Top Position and Places Five Systems in Top Ten of the IO500 10-Node Benchmark'],
    ['date' => '2019-06-19', 'url' => 'https://www.suse.com/c/suse-on-the-io500-list-for-hpc-storage/', 'title' => 'SUSE on the IO500 List for HPC Storage'],
    ['date' => '2018-11-30', 'url' => 'https://forums.theregister.co.uk/forum/1/2018/11/30/wekaio/', 'title' => 'The Register: WekaIO almost, but not quite, summits Summit supercomputer on storage performance'],
    ['date' => '2018-11-30', 'url' => 'https://www.hpcwire.com/off-the-wire/wekaio-places-in-top-five-of-the-virtual-institutes-io-500-10-node-challenge/', 'title' => 'HPCWire: WekaIO Places in Top Five of The Virtual Institute’s IO500 10 Node Challenge'],
    ['date' => '2018-11-15', 'url' => 'https://insidehpc.com/2018/11/new-top500-list-lead-doe-supercomputers/', 'title' => 'New TOP500 List topped by DOE Supercomputers -- mentions IO500!'],
    ['date' => '2018-08-06', 'url' => 'https://insidehpc.com/2018/08/radio-free-hpc-discusses-io500-benchmark-suite-john-bent/', 'title' => 'Radio Free HPC Discusses the IO500 Benchmark Suite with John Bent'],
    ['date' => '2018-07-21', 'url' => 'https://insidehpc.com/2018/07/io500-list-showcases-worlds-fastest-storage-systems-hpc/', 'title' => 'IO500 List Showcases World’s Fastest Storage Systems for HPC'],
    ['date' => '2017-12-06', 'url' => 'https://corelabs.kaust.edu.sa/News/sc2017-driving-the-future-of-supercomputing', 'title' => 'SC2017 - Driving the Future of Supercomputing'],
    ['date' => '2017-11-22', 'url' => 'https://www.ccs.tsukuba.ac.jp/pr20171122/', 'title' => 'Oakforest-PACS ranks #1 in storage performance'],
    ['date' => '2017-11-22', 'url' => 'https://www.itc.u-tokyo.ac.jp/en/blog/2017/11/22/english-oakforest-pacs-system-has-been-registsered-as-the-first-io-500-winner/', 'title' => 'Oakforest-PACS system has been registered as the first IO500 winner'],
    ['date' => '2017-11-21', 'url' => 'https://insidehpc.com/2017/11/jcahpc-japan-wins-inaugural-io500-award-help-ddn/', 'title' => 'JCAHPC in Japan Wins Inaugural IO500 Award with help from DDN'],
    ['date' => '2017-11-15', 'url' => 'https://www.nextplatform.com/2017/11/15/io-500-goes-no-hpc-storage-metric-gone/', 'title' => 'IO500 Goes Where No HPC Storage Metric Has Gone Before'],
    ['date' => '2017-05-12', 'url' => 'https://www.top500.org/news/tracking-the-worlds-top-storage-systems', 'title' => 'Tracking the World’s Top Storage Systems'],
];
$talks = [
    ['date' => '2019-09-23', 'url' => 'https://www.eofs.eu/wp-content/uploads/2024/02/03_matt_raso-barnett-io500-cambridge.pdf', 'title' => 'Matt Rásó-Barnett talk at LAD\'19'],
    ['date' => '2019-05-17', 'url' => 'https://wiki.lustre.org/images/9/92/LUG2019-IO500_Storage_Benchmark_for_HPC-Dilger.pdf', 'title' => 'Andreas Dilger talk at LUG\'19'],
    ['date' => '2019-03-04', 'url' => 'https://2019riceoilgasconference.sched.com/event/JxRM/data-storage-io-performance-providing-balanced-systems-and-expectations-with-the-io500', 'title' => 'John Bent and Steve Crusan talk at Rice O&G'],
    ['date' => '2018-11-14', 'url' => 'https://www.vi4io.org/io500/bofs/start', 'title' => 'Talks available from our SC18 BOF'],
    ['date' => '2018-07-19', 'url' => 'https://www.vi4io.org/_media/io500/bent_io500_data_over_distance_2018.pdf', 'title' => 'John Bent\'s keynote at the ORNL Data over Distance Symposium'],
    ['date' => '2018-06-26', 'url' => 'https://www.vi4io.org/io500/bofs/start', 'title' => 'Talks available from our ISC18 BOF'],
    ['date' => '2017-11-15', 'url' => 'https://www.vi4io.org/io500/bofs/sc17/start', 'title' => 'Talks available from our SC17 BOF'],
    ['date' => '2017-06-25', 'url' => 'https://hps.vi4io.org/_media/research/talks/2017/2017-06-25-io_500_status.pdf', 'title' => 'The status of the IO500: Julian Kunkel\'s talk at LBNL'],
    ['date' => '2017-05-19', 'url' => 'http://drops.dagstuhl.de/opus/volltexte/2017/8282/pdf/dagrep_v007_i005_p097_17202.pdf', 'title' => 'Discussion of IO500 at Daghstuhl seminar documented in Section 8.2'],
    ['date' => '2016-11-17', 'url' => 'https://www.vi4io.org/io500/bofs/sc16/start', 'title' => 'Talks available from our SC16 BOF'],
];
$publications = [
    'papers' => [
        ['title' => 'User-Centric System Fault Identification Using IO500 Benchmark', 'url' => 'https://doi.org/10.1109/PDSW54622.2021.00011', 'bib' => 'resources/2021-PDSW-Liem.bib'],
        ['title' => 'Benchmarking Parallel File System Sensitiveness to I/O Patterns', 'url' => 'https://doi.org/10.1109/MASCOTS.2019.00054', 'bib' => 'resources/2019-MASCOTS-Chasapis.bib'],
        ['title' => 'Profiling Platform Storage using IO500 and Mistral', 'url' => 'https://doi.org/10.1109/PDSW49588.2019.00011', 'bib' => 'resources/2019-PDSW-Monnier.bib'],
        ['title' => 'Scaling High-Performance Parallel File Systems in the Cloud', 'url' => '', 'bib' => 'resources/2018-PDSW-Beckett.bib'],
        ['title' => 'Establishing the IO-500 Benchmark', 'url' => '', 'bib' => 'resources/2016-PDSW-Kunkel.bib'],
    ],
    'datasets' => [
        ['title' => 'IO500 ISC22 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6772541', 'bib' => 'resources/IO500-2022-05.bib'],
        ['title' => 'IO500 SC21 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6462508', 'bib' => 'resources/IO500-2021-11.bib'],
        ['title' => 'IO500 ISC21 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6462505', 'bib' => 'resources/IO500-2021-07.bib'],
        ['title' => 'IO500 SC20 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6462501', 'bib' => 'resources/IO500-2020-11.bib'],
        ['title' => 'IO500 ISC20 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6462499', 'bib' => 'resources/IO500-2020-07.bib'],
        ['title' => 'IO500 SC19 Lists', 'url' => 'https://doi.org/10.5281/zenodo.6462493', 'bib' => 'resources/IO500-2019-11.bib'],
        ['title' => 'IO500 Ranked List ISC19', 'url' => 'https://doi.org/10.5281/zenodo.3354660', 'bib' => 'resources/IO500-2019-06.bib'],
        ['title' => 'IO500 10 node challenge (2018)', 'url' => 'https://doi.org/10.5281/zenodo.6462483', 'bib' => 'resources/IO500-2018-11.bib'],
    ],
    'software' => [
        ['title' => 'VI4IO/io-500-dev: Zenodo Citation Release', 'url' => 'https://doi.org/10.5281/zenodo.2602025', 'bib' => 'resources/IO500-2018-09.bib'],
    ],
];
$discussion = [
    ['date' => '2020-04-15', 'url' => 'https://github.com/ceph/ceph/pull/34574', 'title' => 'IO500 Influenced Ceph patch for mdtest stat'],
    ['date' => '2020-02-29', 'url' => 'https://review.whamcloud.com/#/c/37762/', 'title' => 'IO500 Influenced Lustre patch for IOR hard write'],
    ['date' => '2019-09-27', 'url' => 'https://review.whamcloud.com/36442', 'title' => 'IO500 Influenced Lustre patch for mdtest easy delete'],
    ['date' => '2019-08-19', 'url' => 'https://review.whamcloud.com/35437/', 'title' => 'IO500 Influenced Lustre patch for IOR hard read'],
    ['date' => '2018-04-25', 'url' => 'https://review.whamcloud.com/#/c/32157/', 'title' => 'IO500 Influenced Lustre patch for mdtest stat'],
];
use App\Utility\Bibtex;

$bib = fn(string $file): string => (string)file_get_contents(WWW_ROOT . $file);
$month = fn(string $date): string => date('M Y', strtotime($date));
// Source shown next to press and talk links: the site name for known outlets, else the host.
$source = function (string $url): string {
    $host = preg_replace('/^www\./', '', (string)parse_url($url, PHP_URL_HOST));
    $names = [
        'hpcwire.com' => 'HPCwire', 'theregister.com' => 'The Register', 'theregister.co.uk' => 'The Register',
        'nextplatform.com' => 'The Next Platform', 'insidehpc.com' => 'insideHPC', 'top500.org' => 'TOP500',
        'youtube.com' => 'YouTube', 'storagenewsletter.com' => 'StorageNewsletter',
    ];

    return $names[$host] ?? $host;
};
$links = function (array $rows) use ($month, $source): string {
    $out = '';
    foreach ($rows as $row) {
        $out .= '<tr><td class="d">' . $month($row['date']) . '</td>'
            . '<td><a href="' . h($row['url']) . '" target="_blank" rel="noopener">' . h($row['title']) . '</a></td>'
            . '<td class="src">' . h($source($row['url'])) . '</td></tr>';
    }

    return '<table class="nw-links"><tbody>' . $out . '</tbody></table>';
};
$tabs = [
    'announcements' => ['bi-megaphone', __('Announcements'), null],
    'press' => ['bi-newspaper', __('Press'), count($press)],
    'talks' => ['bi-mic', __('Talks'), count($talks) + count($discussion)],
    'publications' => ['bi-journal-text', __('Publications'), array_sum(array_map('count', $publications))],
];
?>

<div class="landing landing-news">
    <h1><?php echo __('News') ?></h1>

    <p>
        Announcements, list releases, and press coverage from the IO500 community.
    </p>
</div>

<div class="content nw">
    <nav class="submissions-list-types nw-tabs" aria-label="<?php echo __('News sections') ?>">
        <?php foreach ($tabs as $id => [$icon, $label, $count]) : ?>
            <a class="tab<?php echo $id === 'announcements' ? ' tab-active' : '' ?>" href="#<?php echo $id ?>" data-tab="<?php echo $id ?>"><i class="bi <?php echo $icon ?>" aria-hidden="true"></i><b><?php echo $label ?></b><?php echo $count ? '<span class="nw-count">' . $count . '</span>' : '' ?></a>
        <?php endforeach; ?>
    </nav>

    <section id="announcements" class="nw-section">
        <?php echo $this->cell('NewsTimeline', [$announcements])->render() ?>
    </section>

    <section id="press" class="nw-section">
        <?php echo $links($press) ?>
    </section>

    <section id="talks" class="nw-section">
        <?php echo $links($talks) ?>
        <h3 class="nw-sub"><?php echo __('Other public discussion') ?></h3>
        <?php echo $links($discussion) ?>
    </section>

    <section id="publications" class="nw-section">
        <?php foreach (['papers' => __('Papers'), 'datasets' => __('Datasets'), 'software' => __('Software')] as $key => $heading) : ?>
            <h3 class="nw-sub"><?php echo $heading ?></h3>
            <?php foreach ($publications[$key] as $pub) : ?>
                <?php $text = $bib($pub['bib']); $entry = Bibtex::parse($text); ?>
                <article class="nw-pub">
                    <p class="nw-pub-title">
                        <?php if ($pub['url']) : ?>
                            <a href="<?php echo h($pub['url']) ?>" target="_blank" rel="noopener"><?php echo h($pub['title']) ?></a>
                        <?php else : ?>
                            <?php echo h($pub['title']) ?>
                        <?php endif; ?>
                    </p>
                    <?php if ($entry['authors']) : ?>
                        <p class="nw-pub-authors"><?php echo h(implode(', ', $entry['authors'])) ?></p>
                    <?php endif; ?>
                    <p class="nw-pub-venue">
                        <?php echo h(implode(', ', array_filter([$entry['venue'], $entry['year']]))) ?>
                        <?php if ($entry['doi']) : ?>
                            · <a href="<?php echo h($pub['url'] ?: 'https://doi.org/' . $entry['doi']) ?>" target="_blank" rel="noopener">DOI <?php echo h($entry['doi']) ?></a>
                        <?php endif; ?>
                    </p>
                    <details>
                        <summary><?php echo __('Cite (BibTeX)') ?></summary>
                        <pre class="bib"><?php echo h(trim($text)) ?></pre>
                    </details>
                </article>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </section>
</div>

<script>
// Tabs: every section is in the page; without this script they are simply all shown.
(function () {
    var tabs = document.querySelectorAll('.nw-tabs [data-tab]');
    var sections = document.querySelectorAll('.nw-section');
    function show(id) {
        if (!document.getElementById(id)) {
            id = 'announcements';
        }
        tabs.forEach(function (t) { t.classList.toggle('tab-active', t.dataset.tab === id); });
        sections.forEach(function (s) { s.hidden = s.id !== id; });
    }
    tabs.forEach(function (t) {
        t.addEventListener('click', function (e) {
            e.preventDefault();
            history.replaceState(null, '', '#' + t.dataset.tab);
            show(t.dataset.tab);
        });
    });
    show(location.hash.slice(1));
    // Back/forward and links to #press etc. on this page.
    addEventListener('hashchange', function () { show(location.hash.slice(1)); });
})();
</script>
