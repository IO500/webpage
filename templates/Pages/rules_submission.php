<?php $this->assign('title', 'Submission Rules'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('SUBMISSION'), ['controller' => 'pages', 'action' => 'display', 'rules-submission']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>Submission Rules</h3>

    <p>
        The following rules should ensure a fair comparison of the IO500 results between systems and configurations. They serve to reduce mistakes and improve accuracy.
    </p>

    <ol>
        <li>
            Submissions are made using the latest version of the IO500 application in GitHub and all binaries should be built according to the included build instructions.
            <p class="code-block">
                $ git clone https://github.com/IO500/io500.git -b io500-sc20                
            </p>
        </li>
        <li>
            Read-after-write semantics: The system must be able to correctly
            read freshly written data from a different client node after the
            close operation on the writer has been completed.
        </li>
        <ol>
            <li>
                The stonewall flag must be set to 300 to ensure all
                create/write run for at least 300 seconds.
            </li>
            <ol>
                <li>
                    We defined a very high workload for all benchmarks that should satisfy this requirement but you may have to set higher values.
                </li>
                <li>
                    There can be no edits made to the source code including used codes such as <span class="code">IOR</span> beyond changing the allowed variables and adding commands to configure the storage system in <span class="code">io500.sh</span> (e.g. setting striping parameters).
                </li>
                <li>An exception to this rule is possible for submitters who
                    have a legitimate reason by requesting an exception from the
                    committee via <a href="mailto:committee@io500.org" class="link">committee@io500.org</a>.
                </li>
            </ol>
        </ol>
        <li>
            The file names for the mdtest and IOR output files may not be pre-created.
        </li>
        <li>
            You must run all phases of the benchmark on a single storage system without interruption.
        </li>
        <li>
            There is no limitation on the number of storage nodes, the storage
            servers may optionally be co-located on the client nodes.
        </li>
        <li>
            All data must be written to persistent storage within the measured
            time for the individual benchmark, e.g. if a file system caches
            data, it must ensure that data is persistently stored before
            acknowledging the close.
        </li>
        <li>
            Data and metadata must be written in its entirety and not reduced based
            on its contents. The goal of the IO500
            is to provide dataset independent performance results, and techniques
            such as deduplication, compression, and other lossless and lossy techniques
            would bias performance as the
            IO500 benchmark uses partially predictable content that is not
            representative of existing workloads in the real world.
        </li>
        <li>
            Submitting the results must be done in accordance with the instructions on our submission page. Please verify the correctness of your submission before you submit it.
        </li>
        <li>
            If a tool other than the included pfind is used for the find phase, then it must follow the same input and output behavior as the included pfind, and the source code must be included in the submission.
            <ol>
                It is not required to capture the list of matched files.
            </ol>
        </li>
        <li>
            Please also refer to the <a href="https://github.com/IO500/io500/blob/main/README.md" class="link">README</a> documents in the GitHub repo.
        </li>
        <li>
            Please read the <a href="https://github.com/IO500/io500/blob/main/CHANGELOG.md" class="link">CHANGELOG.md</a> file for the new changes on the IO500 benchmark
        </li>
        <li>
            Only submissions using at least 10 physical client nodes are
            eligible to win IO500 awards and at least one benchmark process
            must run on each client.
            <ol>
                <li>
                    We accept results on fewer nodes for documentation
                    purposes but they cannot be awarded.
                </li>
                <li>
                    Virtual machines can be used but the above rule must be
                    followed. More than one virtual machine can be run on
                    each physical node.</li>
                </li>
                <li>
                    For the 10 node challenge, there must be exactly 10 physical client nodes and at least one benchmark process must run on each node.
                </li>
                <li>
                    The only exception to this rule is the find benchmark,
                    which may optionally use fewer nodes/processes.
                </li>
            </ol>
        </li>
        <li>
            Each of the four main phases (IOR easy and hard, mdtest easy and
            hard) has a directory which can be precreated and tuned (e.g.
            using tools such as "<span class="code">lfs setstripe</span>" or
            "<span class="code">beegfs_ctl</span>"; however, additional
            subdirectories within these directories cannot be precreated.
        </li>
        <li>
            Submissions received after the posted deadline for a list may
            be accepted, at the discretion of the committee, upon request to
            <a href="mailto:committee@io500.org" class="link">committee@io500.org</a>.
            In the case where a late submission would be the winner in any
            category, then a key consideration for acceptance is ensuring
            there is enough time before publication of the final list.  Any
            submission not accepted for the current list would be
            automatically submitted for the following list.
        </li>
    </ol>

    <p>
        Please send any requests for changes to these rules or clarifying questions to our mailing list.
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
