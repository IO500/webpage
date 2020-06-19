<div class="releases index content">
    <ul class="plots">
        <li>
            <h3>PFind Easy</h3>
            <iframe src="/plots/plotly/io500-find-easy.html"></iframe>
        </li>
        <li>
            <h3>PFind Hard</h3>
            <iframe src="/plots/plotly/io500-find-hard.html"></iframe>
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