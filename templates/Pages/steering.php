<div class="content">
    <h2>Steering</h2>

    <p>
        The IO-500 benchmark effort is an open effort steered by the following bodies:
    </p>

    <ul>
        <li>The community</li>
        <li>Advisory vendor committee</li>
        <li>Steering committee</li>
    </ul>

    <h3>Community</h3>

    <p>
        The community provides suggestions and is asked to provide feedback on relevant questions before decisions are made. It is organized officially via Birds-of-a-feather sessions during the ISC-HPC and Supercomputing conference series. Everyone is welcome to attend the <a href="https://www.vi4io.org/listinfo/io-500" class="link">mailing list</a> and our <a href="https://join.slack.com/t/vi4io/shared_invite/zt-2z12x7o1-xhWH3WAQJRktDwy0hSus~g" class="link">Slack channel</a> to discuss issues and participate.
    </p>

    <h3>Advisory committee</h3>

    <p>
        This committee provides a closed but fair playing field for all vendors to discuss issues together with the steering committee. Its purpose is to encourage the vendors to participate but allowing vendors to benefit from further information. If you are interested to join apply to the <a href="https://www.vi4io.org/listinfo/io-500" class="link">mailing list</a>.
    </p>

    <h3>Further Reading</h3>

    <p>
        The steering committee is the decision body ensuring the development and curation of the benchmark and its results but also responsible to resolve ethical issues. The committee is listed <?php echo $this->Html->link('here', ['controller' => 'pages', 'action' => 'display', 'rules-membership'], ['class' => 'link']); ?>.
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