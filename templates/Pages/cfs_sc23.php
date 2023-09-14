<?php $this->assign('title', 'Call for Submission'); ?>

<div class="content">
    <h2>Call for Submission</h2>

    <p class="call">
        Stabilization Period: Wednesday, Sept 27th - Friday, Oct 6th, 2023<br/>
        Submission Deadline: Tuesday, Nov 7th, 2023 AoE
    </p>

    <p>
        The IO500 <strong>is now</strong> accepting and encouraging submissions
        for the upcoming 13th semi-annual IO500 lists, in conjunction with
        <strong>SC23</strong>.  Once again, we are also accepting submissions
        to the 10 Client Node Challenge to encourage the submission of small
        scale results.  The new ranked lists will be announced at the
        <?php echo $this->Html->link(__('"IO500: High Performance Storage
         Community" BoF'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-sc23' ],
            [ 'class' => 'link' ]);
         ?>.
         We hope to see many new results.
    </p>
    <p>
        The github repo has a new tag <code>io500-sc23</code> for the current
        version of the benchmark for this list.
    </p>

    <h3>What's New</h3>

    <ol>
        <li>
            <strong>Production and Research Lists</strong> -
            Starting with ISC'23, we implemented a separation of the IO500
            list into Production and Research lists.  This better reflects
            the important distinction between storage systems that run in
            production environments and those that may use more experimental
            hardware and software configurations.  At SC'23, we continue to
            populate these two lists and users can submit results to either of
            the two lists (and their 10 client-node counterparts).  Please see
            <?php echo $this->Html->link('the requirements for each list',
                [ 'controller' => 'pages', 'action' => 'display', 'rules-submission' ],
                [ 'class' => 'link' ]);
            ?> and the
            <?php echo $this->Html->link('IO500 submission rules page',
                [ 'controller' => 'pages', 'action' => 'display', 'rules-submission' ],
                [ 'class' => 'link' ]);
            ?>.
        </li>
        <li>
            <strong>IO500 Submission Tool</strong> - The
            <a href="https://submission.io500.org" target="_blank">IO500 submission tool</a>
            continues to improve the IO500 knowledge base by
            ensuring consistency of system metadata in each submission.
            As part of the submission forms, we have improved the fields
            that describe the hardware and software of the system under test.
            For reproducibility and analysis reasons, the easily obtainable
            fields are mandatory - data from storage servers are for users
            potentially difficult to obtain, therefore, some remain optional.
            We continue to improve the web interface to simplify and improve
            the submission process, but as with any new system, there may be
            quirks.  Please reach out on
            <a href="https://join.slack.com/t/io500workspace/shared_invite/zt-j3i9c00k-niCcUHisgLT2JluYhcxlQQ" class="link">Slack</a>,
            the <a href="http://lists.io500.org/listinfo.cgi/io500-io500.org" class="link">mailing list</a>,
            or <a href="https://github.com/IO500/website/issues" class="link">GitHub</a>
            if you encounter submission issues. Further details will be released
            on the <?php echo $this->Html->link('submission page',
                [ 'controller' => 'pages', 'action' => 'display',
                  'submission' ],
                [ 'class' => 'link' ]);
            ?>.
        </li>
        <li>
            <strong>New Phases</strong> - We are continuing to evaluate the
            inclusion of optional test phases for additional key workloads -
            split easy/hard find phases, 4KB and 1MB random read/write phases,
            and concurrent metadata operations. This is called an extended run.
            At the moment, we collect the information to verify that additional
            phases do not significantly impact the results of a standard run
            and an extended run to facilitate comparisons between the existing
            and new benchmark phases. In a future release, we may include
            some or all of these results as part of the standard benchmark.
            The extended results are not currently included in the scoring of
            any ranked list.
        </li>
    </ol>

    <h3>Background</h3>

    <p>
        The benchmark suite is designed to be easy to run and the community
        has multiple active support channels to help with any questions.
        Please note that submissions of all sizes are welcome; the site has
        customizable sorting, so it is possible to submit on a small system
        and still get a very good per-client score, for example. Additionally,
        the list is about much more than just the raw rank; all submissions
        help the community by collecting and publishing a wider corpus of
        data. More details below.
    </p>

    <p>
        Following the success of the Top500 in collecting and analyzing
        historical trends in supercomputer technology and evolution, the
        IO500 was created in 2017, published its first list at SC17, and
        has grown continually since then.  The need for such an initiative
        has long been known within the High-Performance Computing community;
        however, defining appropriate benchmarks has long been challenging.
        Despite this challenge, the community, after long and spirited
        discussion, finally reached consensus on a suite of benchmarks and
        a metric for resolving the scores into a single ranking.
    </p>

    <p>
        The multi-fold goals of the benchmark suite are as follows:
    </p>

    <ol>
        <li>Maximizing simplicity in running the benchmark suite</li>
        <li>Encouraging optimization and documentation of tuning parameters
            for performance</li>
        <li>Allowing submitters to highlight their "hero run" performance
            numbers</li>
        <li>Forcing submitters to simultaneously report performance for
            challenging IO patterns.</li>
    </ol>

    <p>
        Specifically, the benchmark suite includes a hero-run of both IOR
        and mdtest configured however possible to maximize performance and
        establish an upper-bound for performance.  It also includes an IOR
        and mdtest run with highly prescribed parameters in an attempt to
        determine a lower performance bound. Finally, it includes a namespace
        search as this has been determined to be a highly sought-after
        feature in HPC storage systems that has historically not been
        well-measured.  Submitters are encouraged to share their tuning
        insights for publication.
    </p>

    <p>
        The goals of the community are also multi-fold:
    </p>

    <ol>
        <li>Gather historical data for the sake of analysis and to aid
            predictions of storage futures</li>
        <li>Collect tuning information to share valuable performance
            optimizations across the community</li>
        <li>Encourage vendors and designers to optimize for workloads
            beyond "hero runs"</li>
        <li>Establish bounded expectations for users, procurers, and
            administrators</li>
    </ol>
    <p>
        The IO500 follows a two-staged approach. First, there will
        be a two-week stabilization period during which we encourage
        the community to verify that the benchmark runs properly
        on a variety of storage systems. During this period the
        benchmark may be updated based upon feedback from the
        community. The final benchmark will then be released. We
        expect that runs compliant with the rules made during the
        stabilization period will be valid as a final submission
        unless a significant defect is found.
    </p>


    <h3>10 Client Node I/O Challenge</h3>

    <p>
        The 10 Client Node Challenge is conducted using the regular IO500
        benchmark, however, with the rule that exactly 10 client nodes must
        be used to run the benchmark. You may use any shared storage with
        any number of servers. We will announce the results in the
        Production and Research lists as well as in separate derived lists.
    </p>

    <h3>Birds-of-a-Feather</h3>

    <p>
        Once again, we encourage you to
        <?php echo $this->Html->link('submit',
            [ 'controller' => 'pages', 'action' => 'display', 'submission' ],
            [ 'class' => 'link' ]);
         ?>
        to join our community, and to attend the  
        <?php echo $this->Html->link('ISC23 BoF',
            [ 'controller' => 'pages', 'action' => 'display', 'bof-sc23' ],
            [ 'class' => 'link' ]);
         ?>
        on Wednesday, Nov 15, 2023 at 12:15pm - 1:15pm MST,
        where we will announce the new IO500 Production and Research lists
        and their 10 client node counterparts. The current list includes
        results from over 20 different storage system types and 70
        institutions.  We hope that the upcoming list grows even more.
    </p>
</div>
