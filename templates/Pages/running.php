<?php $this->assign('title', 'Running'); ?>

<div class="landing landing-running">
    <h1><?php echo __('Run IO500') ?></h1>

    <p>
        You can download <b>IO500</b> from the <b>GitHub</b> repository. Follow the instructions in this page to install, configure, and run the benchmark!
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Get IO500'), 'https://github.com/IO500/io500', [
                'class' => 'button-highlight'
            ]);
            ?>
        </li>
    </ul>

    <p class="note">
        Thanks for your participation and good luck!
    </p>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>

<div class="content">
    <h3>Preparation</h3>

    <p>The latest IO500 source code is available from Github:</p>

    <p class="code-block">
        $ git clone https://github.com/IO500/io500.git -b io500-isc21<br/>
        $ cd io500<br/>
        $ ./prepare.sh<br/>
    </p>

    <h3>Installation</h3>

    <p>
        A video with the installation procedure is
        <a class="link" href="https://www.youtube.com/watch?v=RFkuapQ_gkc">
        here</a>.
    </p>

    <h3>Steps</h3>

    <ol>
        <li>
            Modify the existing <span class="code">io500.sh</span> script to
            include the information necessary for your scheduler. Provide
            enough execution time (typically, 2h is enough for a full run) and
            adjust the reserved resources if needed:
            <ul>
                <li>
                    The variables <span class="code">io500_mpirun</span>
                    and <span class="code">io500_mpiargs</span> should be
                    set according to your system and test case.
                </li>
                <li>
                    The <span class="code">setup()</span> section may optionally
                    contain commands to create <em>only the top-level</em> test
                    directories under <span class="code">$workdir</span> for
                    the <span class="code">ior-hard/easy</span> and
                    <span class="code">mdtest-hard/easy</span> test phases.
                </li>
                <li>
                    You can add system-specific information to the script,
                    otherwise you can provide this when uploading the results.
                    The <a class="link" href="https://www.vi4io.org/io500-info-creator/">
                    info-creator</a> helps to create the required output.
                </li>
            </ul>
        </li>
        <li>
            Create a new <span class="code">.ini</span> file using e.g.
            "<span class="code">./io500 --list &gt; myconfig.ini</span>" and
            edit available parameters appropriately for your environment. In
            particular, the following parameters are critical to set correctly:
            <ul>
                <li>
                    <span class="code">[global] datadir</span>
                    (directory where test files will be created)
                </li>
                <li>
                    <span class="code">[global] resultdir</span>
                    (directory where result files will be written)
                </li>
                <li>
                    <span class="code">[global] api</span>
                    (storage interface to use, if not POSIX)
                </li>
            </ul>
            Remember that you need to execute all the mandatory phases
            (ior-easy, ior-hard, mdtest-easy, mdtest-hard, find) for a
            valid submission.  The following variables could be adjusted
            in order to achieve the minimum 300 seconds execution time,
            if the current values are too small for the stonewall timer:
            <ul>
                <li>
                    <span class="code">[ior-easy] blocksize</span>
                    (maximum data written per rank to a separate file)
                </li>
                <li>
                    <span class="code">[ior-hard] segmentCount</span>
                    (maximum segments written per rank)
                </li>
                <li>
                    <span class="code">[mdtest-easy] n</span>
                    (maximum number of files created per rank)
                </li>
                <li>
                    <span class="code">[mdtest-hard] n</span>
                    (maximum number of files created per rank)
                </li>
            </ul>
            Note the generated .ini file may contain sections for "extended"
            test phases (<span class="code">ior-rnd</span>,
             <span class="code">mdworkbench</span>,
             <span class="code">find-easy</span>, and
             <span class="code">find-hard</span>) that are not executed as
            part of the current benchmark and can be ignored.
        </li>
        <li>
            Any modifications to runtime tunables may only be made according
            to the
            <?php echo $this->Html->link(__('IO500 Submission Rules'),
                [ 'controller' => 'pages', 'action' => 'display',
                   'rules-submission'
                ], [ 'class' => 'link' ]);
             ?>.
        </li>
        <li>
            Execute "<span class="code">io500.sh myconfig.ini</span>" directly
            or via a batch job submission.
        </li>
        <li>
            Check the resulting output, and verify that none of the results
            in <span class="code">$resultdir/result_summary.txt</span>
            are marked <span class="code">[INVALID]</span> (e.g. because of a
            runtime below 300s, or other error).  There must also be a
            <span class="code">SCORE</span> line at the end, and it cannot be
            marked <span class="code">[INVALID]</span> (e.g. due to to a
            failed or missing required test phase).
        </li>
        <li>
            At any time, you many create a description for your hardware and
            software environment and save it using the
            <a class="link" href="https://www.vi4io.org/io500-info-creator/">
            info-creator tool</a>. You will be asked at submission time to
            provide the information and can make any final changes.
        </li>
        <li>
            Submit your results, see the 
                <?php echo $this->Html->link(__('submission page'),
                [ 'controller' => 'pages', 'action' => 'display',
                   'submission'
                ], [ 'class' => 'link' ]);
             ?>.
        </li>
    </ol>

    <p>
        A video with the execution and tuning procedure is
        <a href="https://www.youtube.com/watch?v=FRTK9KwPCmg" class="link">here</a>.
    </p>

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
