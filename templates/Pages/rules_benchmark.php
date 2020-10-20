<?php $this->assign('title', 'Change Request'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('CHANGE REQUEST'), ['controller' => 'pages', 'action' => 'display', 'rules-benchmark']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>Change Request</h3>

    <p>
        The IO500 aims to be a robust and long-living benchmark. Nevertheless, the community recognizes the need to consider modifications occasional modifications such as including new access patterns, removing deprecated access patterns, or any other modifications deemed necessary by the community. Therefore, we have established a process to add further benchmarks, which works as follows:
    </p>

    <ol>
        <li>
            A member of the community prepares a (up to) 1-page proposal for the new access pattern to include. This should include a motivation, a rough sketch of the access pattern and justification why the pattern is important. This proposal can then be sent to the community mailing list or the steering board. Deadline: 1 month before the next community meeting &mdash; at the moment, these are the birds-of-a-feather sessions at ISC or Supercomputing.
        </li>
        <li>
            The steering board will give feedback to the technical quality of the proposal.
        </li>
        <li>
            The member is given the opportunity to present the proposal at the next following community IO500 meeting.
        </li>
        <li>
            Given there are no technical concerns, the IO500 benchmark will be modified for the next submission period to allow the execution of a benchmark that represents the pattern as an <em>optional</em> benchmarking step. Additionally, the optional field is introduced into subsequent lists and the changes to the benchmark are documented on the webpage.
        </li>
        <li>
            The optional pattern is kept for at least two subsequent IO500 lists and community meetings. The results and effectiveness of the new pattern are discussed during the community meetings. As a result, it may be removed, remain optional, or may become mandatory.
        </li>
    </ol>

    <p>
       The committee can be reached at <a href="mailto:committee@io500.org">committee@io500.org</a>. 
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
