<div class="submissions index content">
    <ul class="plots">
        <li>
            <h3>MDtest Easy Write</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-easy-write.html"></iframe>
        </li>
        <li>
            <h3>MDtest Easy Stat</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-easy-stat.html"></iframe>
        </li>        
        <li>
            <h3>MDtest Easy Delete</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-easy-delete.html"></iframe>
        </li>
        <li>
            <h3>MDtest Hard Write</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-hard-write.html"></iframe>
        </li>
        <li>
            <h3>MDtest Hard Read</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-hard-read.html"></iframe>
        </li>
        <li>
            <h3>MDtest Hard Stat</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-hard-stat.html"></iframe>
        </li>
        <li>
            <h3>MDtest Hard Delete</h3>
            <iframe src="<?php echo $this->Url->build('/'); ?>/webroot/plots/plotly/io500-mdtest-hard-delete.html"></iframe>
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
