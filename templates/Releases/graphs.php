<div class="landing landing-graphs">
    <h1><?php echo __('Graphs') ?></h1>

    <p>
        Explore some of the  <strong>IO500</strong> plots!<br>
        You can also download a CSV with all the data and create your own plots in R to share with the community.
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Download CSV'), [
                'controller' => 'releases',
                'action' => 'full'
            ], [
                'class' => 'button-highlight'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Create Graphs'), [
                'controller' => 'pages',
                'action' => 'display',
                'about'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
    </ul>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>

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
