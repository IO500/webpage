<?php $this->assign('title', 'About'); ?>

<div class="content">
    <h2>IO500</h2>

    <p>
        The IO500 benchmark has been developed together with the community and its development is still ongoing. The benchmark is essentially a benchmark suite bundled with execution rules. It harnesses existing and trusted open source benchmarks.
    </p>

    <p>
        The goal for the benchmark is to capture user-experienced performance. It aims to be:
    </p>

    <ul>
        <li>Representative</li>
        <li>Understandable</li>
        <li>Scalable</li>
        <li>Portable</li>
        <li>Inclusive</li>
        <li>Lightweight</li>
        <li>Trustworthy</li>
    </ul>

    <h3>The Lists</h3>

    <p>
        We publish multiple lists for each BoF at SC and ISC as well as maintaining the current most up-to-date lists. We publish a <strong>Historic List</strong> of all submissions received and multiple filtered lists from the historic list. We maintain a <strong>Full List</strong> which is the subset of submissions which were valid according to the set of list-specific rules in place at the time of the list’s publication.
    </p>

    <p>
        Our primary lists are <strong>Ranked Lists</strong> which show only opted-in submissions from the <strong>Full List</strong> and only the best submission per storage system. We have two ranked lists: the <strong>IO500 List</strong> for submissions which ran on any number of client nodes and the <strong>10 Node Challenge</strong> list for only those submissions which ran on exactly ten client nodes.
    </p>

    <p>
        In summary, for each BoF, we have the following lists:
    </p>

    <ul>
        <li><strong>Historic list</strong>: all submissions ever received</li>
        <li><strong>Full list</strong>: the subset of the Historic list of
            submissions that are currently valid</li>
        <li><strong>IO500 List</strong>: the subset of the Full list of
            submissions marked for inclusion in the IO500 ranked list, showing
            only one highest-scoring result per storage system</li>
        <li><strong>10-Node Challenge List</strong>: the subset from the Full
            list of submissions run on exactly ten nodes and marked for
            inclusion in the 10-Node Challenge ranked list, showing only one
            highest-scoring result per storage system</li>
    </ul>
    
    <p>
        Please note that the Ranked Lists only show the best submission for
	each storage systems, so if a storage system has multiple submissions
	only the one with the <strong>highest overall score</strong> is shown
	in the Ranked Lists.  All submissions will appear in the Full and
	Historical lists.  However, please note that at the semi-annual BOFs
	we present the <em>IO500 Bandwidth</em> and <em>IO500 Metadata</em>
	awards based on the highest bandwidth and metadata scores.  In some
	cases, the highest bandwidth and metadata scores are on submissions
	for that do not have the highest overall score and are only visible in
	the Full List.
    </p>
        

    <h3>Workloads</h3>

    <p>
        The benchmark covers various workloads and computes a single score for comparison. The workloads are:
    </p>

    <ul>
        <li><strong>IOEasy</strong>: Applications with well optimized I/O patterns</li>
        <li><strong>IOHard</strong>: Applications that require a random workload</li>
        <li><strong>MDEasy</strong>: Metadata/small objects</li>
        <li><strong>MDHard</strong>: Small files (3901 bytes) in a shared directory</li>
        <li><strong>Find</strong>: Finding relevant objects based on patterns</li>
    </ul>

    <p>
        The individual performance numbers are preserved and accessible via the web or the raw data. This allows deriving other relevant metrics.
    </p>

    <p>
        We are in the process to establish a procedure to extend the current workload with further meaningful metrics.
    </p>

    <h3>Further Reading</h3>

    <ul>
        <li>
            <a href="https://www.vi4io.org/_media/io500/about/io500-establishing.pdf">White paper: Establishing the IO-500 Benchmark</a>
        </li>
        <li>
            <a href="https://hps.vi4io.org/_media/research/publications/2018/dltvifiatikl18-the_virtual_institute_for_i_o_and_the_io_500.pdf">Poster: The Virtual Institute for I/O and the IO-500</a>
        </li>
        <li>
            See also various presentations on our <a href="">news page</a>.
        </li>
    </ul>

    <h3>Using the IO500 Logo</h3>

    <p>
        We welcome the promotion of the IO500 using the logo.
    </p>

    <h4>IO500 Logo License Terms</h4>

    <p>
        The IO500 logo is copyrighted us but may be used under the following conditions:
    </p>

    <ol>
        <li>
            The logo is used for its intended purpose to promote the IO500. You may use it:
            <ol>
                <li>together with results obtained by using the IO500 with statements that you are using the benchmark</li>
                <li>together with opinions about the benchmark</li>
            </ol>
        </li>
        <li>
            The appearance of the logo shall not be modified. You may change the file format and resolution.
        </li>
        <li>
            The logo must be placed onto a white or gray background.
        </li>
    </ol>

    <p>
        If you are in doubt, contact the steering board.
    </p>

    <?php
    echo $this->Html->link(
        __('Download the Logo'),
        '../img/logo.png',
        [
            'class' => 'button'
        ]
    );
    ?>

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
