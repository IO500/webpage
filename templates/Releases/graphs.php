<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('STATISTICS'), ['controller' => 'releases', 'action' => 'statistics']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="releases index content">
    <ul class="plots">
        <li>
            <h3>IO500 Score</h3>
            <iframe src="/io500-plots/plotly/io500-score.html"></iframe>
        </li>
        <li>
            <h3>IO500 Bandwidth</h3>
            <iframe src="/io500-plots/plotly/io500-bandwidth.html"></iframe>
        </li>
        <li>
            <h3>IO500 Metadata</h3>
            <iframe src="/io500-plots/plotly/io500-metadata.html"></iframe>
        </li>
    </ul>

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