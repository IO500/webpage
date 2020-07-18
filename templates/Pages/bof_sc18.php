<?php $this->assign('title', 'Birds-of-a-Feather - SC 18'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("SC'18"), ['controller' => 'pages', 'action' => 'display', 'bof-sc18']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>SC'18</h2>

    <h3>The IO-500 and the Virtual Institute of I/O</h3>

    <table class="tb">
        <thread>
            <th>
                <td></td>
                <td></td>
            </th>
        </thread>
        <tbody>
            <tr>
                <td><strong>Date</strong></td>
                <td>Wednesday, November 14th, 5:15pm - 6:45pm</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>D173, Dallas, USA</td>
            </tr>
        </tbody>
    </table>

    <p>
        Link to the <a class="link" href="https://sc18.supercomputing.org/presentation/?id=bof134&sess=sess390" target="_blank">official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for HPC storage. Developed two years ago, the IO500 has released two official lists so far. A BoF highlight is the presentation of the third IO-500 list.
    </p>

    <p>
        The general purpose of this BoF is to foster the IO500 and VI4IO communities to ensure forward progress towards the common goals of creating, sharing, and benefiting from a large corpus of shared storage data. We also serve as a repository of detailed information about production storage system architectures over time as a knowledge base for other researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are to 1) reveal the current IO-500 list and provide highlights and insight; 2) advertise the community hub but also discuss and steer the direction of the community effort; 3) to discuss the benefit and direction of the efforts within the community.
    </p>

    <p>
        The IO-500 benchmark consists of data and metadata benchmarks to identify performance boundaries for optimized and suboptimal applications. Together with comprehensive data from sites, supercomputers, and storage, in-depth analysis of system characteristics are tracked by the list and can be analyzed. In contrast to other lists, the IO-500 collects the execution scripts for providing means of result verification and sharing best practices for data centers.
    </p>

    <p>
        Goals of the Virtual Institute for I/O are:
    </p>

    <ul>
        <li>Provide a platform for I/O researchers and enthusiasts for exchanging information</li>
        <li>Foster international collaboration in the field of high-performance I/O</li>
        <li>Track, and encourage, the deployment of large storage systems by hosting information about high-performance storage systems</li>
    </ul>

    <p>
        Expected HPC audience are 1) I/O experts from data centers and industry, 2) researchers/engineers working on high-performance I/O for data centers, 3) domain scientists and computer scientists interested in discussing I/O issues.
    </p>

    <p>
        The outcome of this BoF will steer the direction of the community efforts.
    </p>

    <h3>Agenda</h3>

    <p>
        We have a series of interactive talks and discussions.
    </p>

    <ul>
        <li>
            <strong>The status of the IO-500</strong> – <em>Jay Lofstead</em> (<a class="link" href="https://www.vi4io.org/_media/io500/bofs/sc18/2018-11-14_io500_bof.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>The Virtual Institute for I/O and the High-Performance Storage List</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://www.vi4io.org/_media/io500/bofs/sc18/sc18_vi4io.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>Benefit and fun providing system details</strong> – <em>Glenn Lockwood</em> (<a class="link" href="https://www.vi4io.org/_media/io500/bofs/sc18/sc18_io500-cdcl.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>The new IO-500 list</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://www.vi4io.org/_media/undefined/bent_io500_sc18-compress.pdf" target="_blank">Slides</a>: Updated after the BOF to add about 80 graphs of analysis)
        </li>
        <li>
            <strong>Community & IO-500</strong>
            <ul>
                <li>
                    <strong>Tuning the IO-500 benchmark</strong> – <em>George Markomanolis</em> (<a class="link"  href="https://www.vi4io.org/_media/io500/bofs/sc18/sc18_tuning_summit.pdf" target="_blank">Slides</a>)
                </li>
                <li>
                    <strong>Reproducibility with IO500 ... and challenges</strong> – <em>George Markomanolis</em> (<a class="link"  href="https://www.vi4io.org/_media/io500/bofs/sc18/sc18_io500_reproducibility.pdf" target="_blank">Slides</a>)
                </li>
                <li>
                    <strong>The Data Accelerator</strong> – <em>Alasdair J. King</em> (<a class="link"  href="https://www.vi4io.org/_media/io500/Cam-BB-IO-500.pdf" target="_blank">Slides</a>)
                </li>
                <li>
                    <strong>IO500 on Bancho Cluster of Exascaler/Lustre</strong> – <em>Shuichi Ihara (DDN)</em> (<a class="link"  href="https://www.vi4io.org/_media/io500/bofs/sc18/sc18_io500-wc-ihara.pdf" target="_blank">Slides</a>)
                </li>
            </ul>
        </li>
        <li>
            <strong>Discussion</strong> – <em>Jay, Julian, John, George</em>
        </li>
    </ul>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/sc18/sc-bof-ceremony-10.jpeg?w=400&tok=7eb04a">
        </div>
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/sc18/sc-bof-ceremony.jpeg?w=400&tok=b70974">
        </div>
    </div>

    <div id="disqus_thread"></div>
</div>

<script>
var disqus_config = function () {
    this.page.url = "<?php echo $this->Url->build($this->request->getRequestTarget(), ['fullBase' => true]); ?>";
    this.page.identifier = "<?php echo $this->Url->build($this->request->getRequestTarget()); ?>";
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://io500.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
