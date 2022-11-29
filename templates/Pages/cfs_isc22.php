<?php $this->assign('title', 'Call for Submission - ISC 22');
 //-*- mode: c; c-basic-offset: 4; indent-tabs-mode: nil; -*-
 // * vim:expandtab:shiftwidth=4:tabstop=4:
 ?>

<div class="content">
    <h2>Call for Submission</h2>

    <p class="call">
        Stabilization Period: Monday, April 4th - Friday, April 15th
        Submission Deadline: Friday, May 13th, 2022 AoE
    </p>

    <p>
        The IO500 is now accepting and encouraging submissions for the
        upcoming 10th semi-annual IO500 list, in conjunction with ISC-HPC'22.
        Once again, we are also accepting submissions to the 10 Node
        Challenge to encourage the submission of small scale results.
        The new ranked lists will be announced via live-stream during
        <?php echo $this->Html->link(__('"The IO500 and the Virtual Institute of I/O" BoF'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-isc22' ],
            [ 'class' => 'link' ]);
         ?>.  We hope to see many new results.
    </p>

    <h3>What's New</h3>
    <ol>
        <li>
            With ISC'22, we are proposing a separation of the list into
            separate Producion and Research lists, to better reflect the
            important distinction between storage systems that run in
            production environments and those that may use more experimental
            hardware and software configurations.
        </li>
        <li>
            Since ISC'21, the IO500 follows a two-staged approach.
            First, there will be a two-week stabilization period during which
            we encourage the community to verify that the benchmark runs
            properly on a variety of storage systems. During this period the
            benchmark may be updated based upon feedback from the community.
            The final benchmark will then be released.  We expect that runs
            compliant with the rules made during the stabilization period will
            be valid as a final submission unless a significant defect is found.
        </li>
        <li>
            We are now creating a more detailed schema to describe the
            hardware and software of the system under test and provide the
            first set of tools to ease capturing of this information for
            inclusion with the submission.
            Further details will be released on the
            <?php echo $this->Html->link(__('submission page'),
                [ 'controller' => 'pages', 'action' => 'display', 'submission' ],
                [ 'class' => 'link' ]);
             ?>.
        </li>
        <li>
            We are evaluating the inclusion of optional test phasaes for
            additional key workloads - split easy/hard find phases, 4KB
            and 1MB random read/write phases, and concurrent metadata
            operations.  This is called an extended run.  At the moment,
            we collect the information to verify that additional phases
            do not significaantly impact the results of a standard run
            and an extended run to facilitate comparisons between the
            existing and new benchmark phases.  In a future release, we
            may include some or all of these results as part of the 
            standard benchmark.  The extended results are not currently
            included in the scoring of any ranked list.
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
        help the community by collecting and publishing a wider corpus of data.
        More details below.
    </p>

    <p>
        Following the success of the Top500 in collecting and analyzing
        historical trends in supercomputer technology and evolution, the
        IO500 was created in 2017, published its first list at SC17, and has
        grown continually since then. The need for such an initiative has
        long been known within High-Performance Computing; however, defining
        appropriate benchmarks has long been challenging. Despite this
        challenge, the community, after long and spirited discussion, finally
        reached consensus on a suite of benchmarks and a metric for resolving
        the scores into a single ranking.
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
        establish an upper-bound for performance. It also includes an IOR
        and mdtest run with highly prescribed parameters in an attempt to
        determine a lower performance bound. Finally, it includes a namespace
        search as this has been determined to be a highly sought-after
        feature in HPC storage systems that has historically not been
        well-measured. Submitters are encouraged to share their tuning
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

    <h3>10 Node I/O Challenge</h3>

    <p>
        The 10 Node Challenge is conducted using the regular IO500 benchmark,
        however, with the rule that exactly 10 client nodes must be used to
        run the benchmark. You may use any shared storage with any number of
        servers. When submitting for the IO500 list, you can opt-in for
        "Participate in the 10 compute node challenge only", then we will not
        include the results into the ranked list. Other 10-node node
        submissions will be included in the full list and in the ranked list.
        We will announce the result in a separate derived list and in the full
        list but not on the ranked IO500 list at io500.org.
    </p>

    <h3>Birds-of-a-Feather</h3>
    <p>
        Once again, we encourage you to
        <?php echo $this->Html->link(__('submit'),
            [ 'controller' => 'pages', 'action' => 'display', 'submission' ],
            [ 'class' => 'link' ]);
         ?>
        to join our community, and to attend our BoF 
        <?php echo $this->Html->link(__('"The IO500 and the Virtual Institute of I/O"'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-isc22' ],
            [ 'class' => 'link' ]);
         ?>,
         where we will announce the new IO500 and 10 node challenge lists.
         The current list includes results from
         twenty different storage system types and 70 institutions.
         We hope that the upcoming list grows even more.
    </p>
</div>
