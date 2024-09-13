<?php $this->assign('title', 'Call for Submission'); ?>

<div class="content">
    <h2>Call for Submission</h2>
    <p class="call">
        Submission Deadline: Nov 10th, 2024 AoE
    </p>

    <p>
        The IO500 <strong>is now</strong> accepting and encouraging submissions
        for the upcoming 15th semi-annual IO500 Production and Research lists,
        in conjunction with <strong>SC'24</strong>.  We are also
        accepting submissions to the 10 Client Node Challenge to encourage the
        submission of small scale results.  View the requirements for submitting
        to each list on the
        <?php echo $this->Html->link(__('IO500 Submissions Webpage'),
            [ 'controller' => 'pages', 'action' => 'display', 'submission' ],
            [ 'class' => 'link' ]);
         ?>.
        The new ranked lists will be announced at the
        <?php echo $this->Html->link(__('"IO500: High Performance Storage
         Community" BoF'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-sc24' ],
            [ 'class' => 'link' ]);
         ?>.
         We hope to see many new results.
    </p>
    <p>
        The github repo has a new tag <code>io500-sc24</code> for the current
        version of the benchmark for this list.
    </p>

    <h3>Background</h3>
    <p>
        Following the success of the Top500 in collecting and analyzing
        historical trends in supercomputer technology and evolution, the
        IO500 was created in 2017, published its first list at SC17, and
        has grown continually since then. The benchmarks represent
        community accepted standards, including being used in Request
        for Proposals for new HPC platforms. The benchmarks showcase
        the IO access pattern extremes giving a full picture of
        storage system potential performance. The list is about
        much more than just the raw rank; all submissions help the
        community by collecting and publishing a wider corpus of
        data.
    </p>

    <p>
        The multi-fold goals of the benchmark suite are as follows:
    </p>

    <ol>
        <li>Represent naive and optimized access patterns for the
            execution of a rich variety of HPC  applications, their
            achievable performance and the documentation of how the
            numbers are achieved.</li>

        <li>Support small to extreme-scale Research and Production HPC
            systems using flexible storage APIs</li>
        <li>Maximizing simplicity in running the benchmark suite</li>
    </ol>

    <p>
        Specifically, the benchmark suite includes a hero-run of both IOR
        and mdtest configured however possible to maximize performance and
        establish an upper-bound for performance.  It also includes an IOR
        and mdtest run with highly prescribed parameters in an attempt to
        determine a lower performance bound. Finally, it includes a namespace
        search as this has been determined to be a highly sought-after
        feature in HPC storage systems that has historically not been
        well-measured.  Supported storage APIs are those that are part of
        IOR and mdtest.  Extending these tools with a public pull request
        can be done to enable new storage APIs.
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
        <li>Understand and be able to reproduce performance on storage
            systems</li>
    </ol>
    <p>
        Using the IO500 Reproducibility guidelines, each submission
        is labeled according to the breadth of details provided and
        the access to the deployed storage software that enables
        the community to reproduce the results and study system
        design changes over time.
    </p>
    <p>
        This year, since there are no changes to the benchmark,
        we are skipping the stabilization period and just releasing
        the final benchmark.
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
        <?php echo $this->Html->link('SC24 BoF',
            [ 'controller' => 'pages', 'action' => 'display', 'bof-sc24' ],
            [ 'class' => 'link' ]);
         ?>
        on Tuesday, Nov 19, 2024 at 12:15pm - 1:15pm EST,
        where we will announce the new IO500 Production and Research lists
        and their 10 client node counterparts.
    </p>
    <h2>Be Part of the Community</h2>
    <p>
        Submissions of all sizes are welcome; the webpage has
        customizable sorting, so it is possible to submit on a small
        system and still get a very good per-client score, for
        example. We will also highlight new and interesting results
        with invited talk(s) at the BoF.
    </p>
</div>
