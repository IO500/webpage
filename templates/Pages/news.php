<?php $this->assign('title', 'News'); ?>

<?php
function cite($file) {
    return file_get_contents(WWW_ROOT . $file);
}
?>

<div class="content">
    <h2>News</h2>

    <ul class="news">
        <li>
            <span class="date">2025-05-01</span>
            The <?php echo $this->Html->link(__('Call for Submissions'),
                    [ 'controller' => 'pages', 'action' => 'display',
                      'cfs_isc25'
                    ], [ 'class' => 'link' ]);
                ?>
            for the sixteenth IO500 list at ISC 2025 is sent out.
        </li>
        <li>
            <span class="date">2024-09-12</span>
            The <?php echo $this->Html->link(__('Call for Submissions'),
                    [ 'controller' => 'pages', 'action' => 'display',
                      'cfs_sc24'
                    ], [ 'class' => 'link' ]);
                ?>
            for the fifteenth IO500 list at SC 2024 has been released!
        </li>
        <li>
            <span class="date">2024-03-30</span>
            The <?php echo $this->Html->link(__('Call for Submissions'),
                    [ 'controller' => 'pages', 'action' => 'display',
                      'cfs_isc24'
                    ], [ 'class' => 'link' ]);
                ?>
            for the fourteenth IO500 list at ISC 2024 is sent out.
        </li>
        <li>
            <span class="date">2023-11-15</span>
            The thirteenth IO500 lists are published at SC'23.
            <ul>
                <li>
                    Congratulations to Argonne National Laboratory for their
                    Aurora DAOS submission that took over the #1 spot on the
                    Production list, and also the "10 Node Challenge Production"
                    list.
                    Pengcheng Laboratory and their Cloudbrain-II system using
                    MadFS maintained the #1 Research spot, while JNIST and
                    HUST PDSL maintained the #1 spot on the "10 Node Challenge
                    Research" list with OceanFS2.
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2023-05-24</span>
            The twelfth IO500 lists are published at ISC'23.
            <ul>
                <li>
                    Congratulations to LRZ for their SuperMUC-NG DAOS
                    submission that had #1 spot on the innaugural Production
                    list, and also the "10 Node Challenge Production" list.
                    Pengcheng Laboratory and their Cloudbrain-II system using
                    MadFS maintained the #1 Research spot, while JNIST and
                    HUST PDSL took over the #1 spot on the "10 Node Challenge
                    Research" list with OceanFS2.
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2022-11-15</span>
            The eleventh IO500 lists are published at SC'22.
            <ul>
                <li>
                    Congratulations again to Pengcheng Laboratory for their
                    Cloudbrain-II system using MadFS, which maintained the
                    #1 overall spot, while Argonne National Laboratory debut
                    a new DAOS system for their Aurora cluster in the #2 spot.
                    Sugon Cloud Storage Laboratory maintained
                    the #1 spot on the "10 Node Challenge" list.
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2021-05-30</span>
            The tenth IO500 list is published at ISC'22.
            <ul>
                <li>
                    Congratulations again to Pengcheng Laboratory for their
                    Cloudbrain-II system using MadFS, which maintained the
                    #1 overall spot. The Sugon Cloud Storage Laboratory won
                    the "10 Node Challenge".
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2021-11-18</span>
            The ninth IO500 list is published at SC'21.
            <ul>
                <li>
                    Congratulations again to Pengcheng Laboratory for their
                    Cloudbrain-II system using MadFS, which maintained the
                    #1 overall spot and also won the "10 Node Challenge", and
		    to Huawei with new systems in second and third place.
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2021-07-01</span>
            The eighth IO500 list is published at ISC'21.
            <ul>
                <li>
                    Congratulations to Pengcheng Laboratory for their
                    Cloudbrain-II system using MadFS, which maintained the
                    #1 overall spot and also won the "10 Node Challenge".
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2021-04-14</span>
                <?php echo $this->Html->link(__('Press Release for April 14, 2021'),
                    [ 'controller' => 'pages', 'action' => 'display',
                      'news-20210414'
                    ], [ 'class' => 'link' ]);
                ?>.
        </li>
        <li>
            <span class="date">2020-11-18</span>
            The seventh IO500 list is published at SC'20.
        </li>
        <li>
            <span class="date">2020-07-23</span>
            The sixth IO500 list is published at ISC'20.
        </li>
        <li>
            <span class="date">2019-11-19</span>
            The fifth IO500 list is published at SC'19.
        </li>
        <li>
            <span class="date">2019-06-23</span>
            The fourth IO500 list is published at ISC'19.
        </li>
        <li>
            <span class="date">2018-11-14</span>
            The third IO500 list is published.

            <ul>
                <li>
                    Congrats to ORNL for their Summit machine which took over the #1 overall spot and also won the "10 Node Challenge".
                </li>
                <li>
                    A total of 54 new submissions from 19 different institutions!
                </li>
            </ul>
        </li>
        <li>
            <span class="date">2018-06-28</span>
            The second IO500 list is published. Congrats again to Oakforest-PACS.
        </li>
        <li>
            <span class="date">2017-11-15</span>
            The first IO500 list is published. We congratulate Oakforest-PACS for their winning submission.
        </li>
    </ul>

    <h3>Press</h3>

    <ul class="news">
        <li>
            <span class="date">2021-11-18</span>
	    <a class="link"
	     href="https://e.huawei.com/en/news/ebg/2021/huawei-oceanstor-pacific-storage-takes-second-io500-list"
	     target="_blank">Huawei OceanStor Pacific Storage Takes Second Place in the IO500 List</a>
        </li>
        <li>
            <span class="date">2021-08-07</span>
	    <a class="link"
	     href="https://cloud.google.com/blog/topics/hpc/google-cloud-ranks-on-io500-benchmark-with-lustre"
	     target="_blank">Scaling data access to 10Tbps (yes, terabits) with Lustre</a>
        </li>
        <li>
            <span class="date">2021-07-07</span>
	    <a class="link"
	    href="https://www.hpcwire.com/2021/07/07/pengchen-labs-madfs-and-intels-daos-shine-in-latest-io500"
	    target="_blank">Pengchen Lab's MadFS and Intel's DAOS Shine in Latest IO500</a>
        </li>
        <li>
            <span class="date">2021-07-06</span> <a class="link" href="https://www.hpcwire.com/off-the-wire/4-rsc-storage-systems-represent-russia-in-global-io500-rating" target="_blank">4 RSC Storage Systems Represent Russia in Global IO500 Rating</a>
        </li>
        <li>
            <span class="date">2020-11-19</span> <a class="link" href="https://www.hpcwire.com/off-the-wire/three-rsc-supercomputers-represent-russia-in-global-io500-rating" target="_blank">Three RSC Supercomputers Represent Russia in Global IO500 Rating</a>
        </li>
        <li>
            <span class="date">2020-08-11</span> <a class="link" href="https://www.hpcwire.com/2020/08/11/intels-optane-daos-tops-latest-io500/" target="_blank">Intel's Optane/DAOS Solution Tops Latest IO500</a>
        </li>
        <li>
            <span class="date">2020-07-31</span> <a class="link" href="http://r.sib-thinkparq.com/mk/mr/viWS5JF2TimqIJf0fp4QtrOdOczUOgyIm3aA55sjNPc-CXS50xUer6nSU7T_ZpPhePCtm5Ra61VsXiIBF1vvfGJAxri0TLWnYXFxfkY" target="_blank">BeeGFS Newsletter announces their position in IO500</a>
        </li>
        <li>
            <span class="date">2020-07-23</span> <a class="link" href="https://www.suse.com/c/ses-best_ceph_arm_benchmarkenterprise-storage-delivers-best-cephfs-benchmark-on-arm/" target="_blank">SUSE Enterprise Storage delivers best CephFS benchmark on Arm</a>
        </li>
        <li>
            <span class="date">2019-11-29</span> <a class="link" href="https://storagenewsletter.com/2019/11/29/sc19-virtual-institute-for-i-o-ranking-combination-of-system-institution-file-system/" target="_blank">Storage newsletter: SC19: Virtual Institute for I/O Ranking Combination of System/Institution/File System</a>
        </li>
        <li>
            <span class="date">2019-11-19</span> <a class="link" href="https://www.suse.com/c/suse-andthe-io500-sc19/" target="_blank">SUSE and the IO500 @ SC19</a>
        </li>
        <li>
            <span class="date">2019-06-19</span> <a class="link" href="https://www.hpcwire.com/off-the-wire/ddn-selected-for-top-position-and-places-five-systems-in-top-ten-of-the-io500-10-node-benchmark/" target="_blank">DDN Selected for Top Position and Places Five Systems in Top Ten of the IO500 10-Node Benchmark</a>
        </li>
        <li>
            <span class="date">2019-06-19</span> <a class="link" href="https://www.suse.com/c/suse-on-the-io500-list-for-hpc-storage/" target="_blank">SUSE on the IO500 List for HPC Storage</a>
        </li>
        <li>
            <span class="date">2018-11-30</span> <a class="link" href="https://forums.theregister.co.uk/forum/1/2018/11/30/wekaio/" target="_blank">The Register: WekaIO almost, but not quite, summits Summit supercomputer on storage performance</a>
        </li>
        <li>
            <span class="date">2018-11-30</span> <a class="link" href="https://www.hpcwire.com/off-the-wire/wekaio-places-in-top-five-of-the-virtual-institutes-io-500-10-node-challenge/" target="_blank">HPCWire: WekaIO Places in Top Five of The Virtual Institute’s IO500 10 Node Challenge</a>
        </li>
        <li>
            <span class="date">2018-11-15</span> <a class="link" href="https://insidehpc.com/2018/11/new-top500-list-lead-doe-supercomputers/" target="_blank">New TOP500 List topped by DOE Supercomputers -- mentions IO500!</a>
        </li>
        <li>
            <span class="date">2018-08-06</span> <a class="link" href="https://insidehpc.com/2018/08/radio-free-hpc-discusses-io500-benchmark-suite-john-bent/" target="_blank">Radio Free HPC Discusses the IO500 Benchmark Suite with John Bent</a>
        </li>
        <li>
            <span class="date">2018-07-21</span> <a class="link" href="https://insidehpc.com/2018/07/io500-list-showcases-worlds-fastest-storage-systems-hpc/" target="_blank">IO500 List Showcases World’s Fastest Storage Systems for HPC</a>
        </li>
        <li>
            <span class="date">2017-12-06</span> <a class="link" href="https://corelabs.kaust.edu.sa/News/sc2017-driving-the-future-of-supercomputing" target="_blank"> SC2017 - Driving the Future of Supercomputing</a>
        </li>
        <li>
            <span class="date">2017-11-22</span> <a class="link" href="https://www.ccs.tsukuba.ac.jp/pr20171122/" target="_blank">Oakforest-PACS ranks #1 in storage performance</a>
        </li>
        <li>
            <span class="date">2017-11-22</span> <a class="link" href="https://www.itc.u-tokyo.ac.jp/en/blog/2017/11/22/english-oakforest-pacs-system-has-been-registsered-as-the-first-io-500-winner/" target="_blank">Oakforest-PACS system has been registered as the first IO500 winner</a>
        </li>
        <li>
            <span class="date">2017-11-21</span> <a class="link" href="https://insidehpc.com/2017/11/jcahpc-japan-wins-inaugural-io500-award-help-ddn/" target="_blank">JCAHPC in Japan Wins Inaugural IO500 Award with help from DDN</a>
        </li>
        <li>
            <span class="date">2017-11-15</span> <a class="link" href="https://www.nextplatform.com/2017/11/15/io-500-goes-no-hpc-storage-metric-gone/" target="_blank">IO500 Goes Where No HPC Storage Metric Has Gone Before</a>
        </li>
        <li>
            <span class="date">2017-05-12</span> <a class="link" href="https://www.top500.org/news/tracking-the-worlds-top-storage-systems" target="_blank">Tracking the World’s Top Storage Systems</a>
        </li>
    </ul>

    <h3>Talks</h3>

    <ul class="news">
        <li>
            <span class="date">2019-09-23</span> <a class="link" href="https://www.eofs.eu/_media/events/lad19/03_matt_raso-barnett-io500-cambridge.pdf">Matt Rásó-Barnett talk at LAD'19</a>
        </li>
        <li>
            <span class="date">2019-05-17</span> <a class="link" href="https://conference.cacds.uh.edu/wp-content/uploads/2019/05/LUG2019-IO500-Dilger.pdf">Andreas Dilger talk at LUG'19</a>
        </li>
        <li>
            <span class="date">2019-03-04</span> <a class="link" href="https://2019riceoilgasconference.sched.com/event/JxRM/data-storage-io-performance-providing-balanced-systems-and-expectations-with-the-io500">John Bent and Steve Crusan talk at Rice O&G</a>
        </li>
        <li>
            <span class="date">2018-11-14</span> <a class="link" href="https://www.vi4io.org/io500/bofs/start">Talks available from our SC18 BOF</a>
        </li>
        <li>
            <span class="date">2018-07-19</span> <a class="link" href="https://www.vi4io.org/_media/io500/bent_io500_data_over_distance_2018.pdf">John Bent's keynote at the ORNL Data over Distance Symposium</a>
        </li>
        <li>
            <span class="date">2018-06-26</span> <a class="link" href="https://www.vi4io.org/io500/bofs/start">Talks available from our ISC18 BOF</a>
        </li>
        <li>
            <span class="date">2017-11-15</span> <a class="link" href="https://www.vi4io.org/io500/bofs/sc17/start">Talks available from our SC17 BOF</a>
        </li>
        <li>
            <span class="date">2017-06-25</span> <a class="link" href="https://hps.vi4io.org/_media/research/talks/2017/2017-06-25-io_500_status.pdf">The status of the IO500: Julian Kunkel's talk at LBNL</a>
        </li>
        <li>
            <span class="date">2017-05-19</span> <a class="link" href="http://drops.dagstuhl.de/opus/volltexte/2017/8282/pdf/dagrep_v007_i005_p097_17202.pdf">Discussion of IO500 at Daghstuhl seminar documented in Section 8.2</a>
        </li>
        <li>
            <span class="date">2016-11-17</span> <a class="link" href="https://www.vi4io.org/io500/bofs/sc16/start">Talks available from our SC16 BOF</a>
        </li>
    </ul>

    <h3>Publications</h3>

    <ul>
        <li>
            <h3 class="doi">
                User-Centric System Fault Identification Using IO500 Benchmark
                <a href="https://doi.org/10.1109/PDSW54622.2021.00011"><img src="https://zenodo.org/badge/DOI/10.1109/PDSW54622.2021.00011.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/2021-PDSW-Liem.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                Benchmarking Parallel File System Sensitiveness to I/O Patterns
                <a href="https://doi.org/10.1109/MASCOTS.2019.00054"><img src="https://zenodo.org/badge/DOI/10.1109/MASCOTS.2019.00054.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/2019-MASCOTS-Chasapis.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                Profiling Platform Storage using IO500 and Mistral
                <a href="https://doi.org/10.1109/PDSW49588.2019.00011"><img src="https://zenodo.org/badge/DOI/10.1109/PDSW49588.2019.00011.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/2019-PDSW-Monnier.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3>Scaling High-Performance Parallel File Systems in the Cloud</h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/2018-PDSW-Beckett.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3>Establishing the IO-500 Benchmark</h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/2016-PDSW-Kunkel.bib'); ?></p>
            </div>
        </li>
    </ul>

    <h3>Datasets</h3>

    <ul>
        <li>
            <h3 class="doi">
                IO500 ISC22 Lists
                <a href="https://doi.org/10.5281/zenodo.6772541"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6772541.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2022-05.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 SC21 Lists
                <a href="https://doi.org/10.5281/zenodo.6462508"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462508.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2021-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 ISC21 Lists
                <a href="https://doi.org/10.5281/zenodo.6462505"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462505.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2021-07.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 SC20 Lists
                <a href="https://doi.org/10.5281/zenodo.6462501"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462501.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2020-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 ISC20 Lists
                <a href="https://doi.org/10.5281/zenodo.6462499"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462499.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2020-07.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 SC19 Lists
                <a href="https://doi.org/10.5281/zenodo.6462493"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462493.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2019-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 Ranked List ISC19
                <a href="https://doi.org/10.5281/zenodo.3354660"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.3354660.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2019-06.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 10 node challenge (2018)
                <a href="https://doi.org/10.5281/zenodo.6462483"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462483.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2018-11.bib'); ?></p>
            </div>
        </li>
    </ul>

    <h3>Software</h3>

    <ul>
        <li>
            <h3 class="doi">
                VI4IO/io-500-dev: Zenodo Citation Release
                <a href="https://doi.org/10.5281/zenodo.2602025"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.2602025.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2018-09.bib'); ?></p>
            </div>
        </li>
    </ul>

    <h3>Other Public Discussion</h3>

    <ul class="news">
        <li>
            <span class="date">2020-04-15</span> <a class="link" href="https://github.com/ceph/ceph/pull/34574">IO500 Influenced Ceph patch for mdtest stat</a>
        </li>
        <li>
            <span class="date">2020-02-29</span> <a class="link" href="https://review.whamcloud.com/#/c/37762/">IO500 Influenced Lustre patch for IOR hard write</a>
        </li>
        <li>
            <span class="date">2019-09-27</span> <a class="link" href="https://review.whamcloud.com/36442" target="_blank">IO500 Influenced Lustre patch for mdtest easy delete</a>
        </li>
        <li>
            <span class="date">2019-08-19</span> <a class="link" href="https://review.whamcloud.com/35437/" target="_blank">IO500 Influenced Lustre patch for IOR hard read</a>
        </li>
        <li>
            <span class="date">2018-04-25</span> <a class="link" href="https://review.whamcloud.com/#/c/32157/" target="_blank">IO500 Influenced Lustre patch for mdtest stat</a>
        </li>
    </ul>
</div>
