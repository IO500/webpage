<?php $this->assign('title', 'Call for Submission'); ?>

<div class="content">
    <h2>Call for Submission</h2>

    <p class="button">
        Deadline: 11 June 2021 AoE
    </p>

    <p>
        The IO500 Committee is now accepting and encouraging submissions for
        the upcoming 8th IO500 list at ISC'21. Once again, we are also
        accepting submissions to the 10 Node Challenge to encourage the
        submission of small scale results. The new ranked lists will be
        announced via live-stream at a virtual session. We hope to see many
        new results.
    </p>

    <p>
        The benchmark suite is designed to be easy to run and the community has multiple active support channels to help with any questions. Please note that submissions of all sizes are welcome; the site has customizable sorting so it is possible to submit on a small system and still get a very good per-client score for example. Additionally, the list is about much more than just the raw rank; all submissions help the community by collecting and publishing a wider corpus of data. More details below.
    </p>

    <p>
        Following the success of the Top500 in collecting and analyzing historical trends in supercomputer technology and evolution, the IO500 was created in 2017, published its first list at SC17, and has grown exponentially since then. The need for such an initiative has long been known within High-Performance Computing; however, defining appropriate benchmarks had long been challenging. Despite this challenge, the community, after long and spirited discussion, finally reached consensus on a suite of benchmarks and a metric for resolving the scores into a single ranking.
    </p>

    <p>
        The multi-fold goals of the benchmark suite are as follows:
    </p>

    <ol>
        <li>Maximizing simplicity in running the benchmark suite</li>
        <li>Encouraging complexity in tuning for performance</li>
        <li>Allowing submitters to highlight their "hero run" performance numbers</li>
        <li>Forcing submitters to simultaneously report performance for challenging IO patterns.</li>
    </ol>

    <p>
        Specifically, the benchmark suite includes a hero-run of both IOR and mdtest configured however possible to maximize performance and establish an upper-bound for performance. It also includes an IOR and mdtest run with highly prescribed parameters in an attempt to determine a lower-bound. Finally, it includes a namespace search as this has been determined to be a highly sought-after feature in HPC storage systems that has historically not been well-measured. Submitters are encouraged to share their tuning insights for publication.
    </p>

    <p>
        The goals of the community are also multi-fold:
    </p>

    <ol>
        <li>Gather historical data for the sake of analysis and to aid predictions of storage futures</li>
        <li>Collect tuning information to share valuable performance optimizations across the community</li>
        <li>Encourage vendors and designers to optimize for workloads beyond "hero runs"</li>
        <li>Establish bounded expectations for users, procurers, and administrators</li>
    </ol>

    <h4>10 Node I/O Challenge</h4>

    <p>
        The 10 Node Challenge is conducted using the regular IO500 benchmark, however, with the rule that exactly 10 client nodes must be used to run the benchmark. You may use any shared storage with, e.g., any number of servers. When submitting for the IO500 list, you can opt-in for "Participate in the 10 compute node challenge only", then we will not include the results into the ranked list. Other 10-node node submissions will be included in the full list and in the ranked list. We will announce the result in a separate derived list and in the full list but not on the ranked IO500 list at io500.org.
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
