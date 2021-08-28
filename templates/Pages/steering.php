<?php $this->assign('title', 'Steering'); ?>

<div class="content">
    <h2>Steering</h2>

    <p>
        The IO500 benchmark effort is an open effort steered by the following bodies:
    </p>

    <ul>
        <li>The community</li>
        <li>Advisory vendor committee</li>
        <li>Steering committee</li>
    </ul>

    <h3>Community</h3>

    <p>
        The community provides suggestions and is asked to provide feedback on relevant questions before decisions are made.
        It is organized officially via Birds-of-a-feather sessions during the ISC-HPC and Supercomputing conference series.
        Everyone is welcome to join the <a href="http://lists.io500.org/listinfo.cgi/io500-io500.org" class="link">mailing list</a> and
        our <a href="https://join.slack.com/t/io500workspace/shared_invite/zt-j3i9c00k-niCcUHisgLT2JluYhcxlQQ" class="link">Slack channel</a> to discuss issues and participate.
    </p>

    <h3>Advisory committee</h3>

    <p>
        This committee provides a closed but fair playing field for all vendors to discuss issues together with the steering committee. Its purpose is to encourage the vendors to participate but allowing vendors to benefit from further information.
        If you are interested to join, please join the <a href="http://lists.io500.org/listinfo.cgi/io500-io500.org" class="link">mailing list</a>.
    </p>

    <h3>Steering Committee</h3>
    <p>
        The steering committee is the decision body ensuring the development and curation of the benchmark and its results but also responsible to resolve ethical issues.
    </p>    
    <p>
        The current <b>IO500 Committee<b>, consists of the following members (in alphabetical order):
    </p>
    <ul>
      <li>Andreas Dilger - Whamcloud/DDN</li>
      <li>Dean Hildebrand - Google</li>
      <li><a class="link" href="https://hps.vi4io.org/about/people/julian_kunkel">Julian Kunkel - Georg-August-Universität Göttingen/GWDG</a></li>
      <li><a class="link" href="https://cfwebprod.sandia.gov/cfdocs/CompResearch/templates/insert/profile.cfm?gflofst">Jay Lofstead - Sandia National Laboratories</a></li>
      <li><a class="link" href="http://www.markomanolis.com/site/index.html">George Markomanolis - CSC - IT Center For Science Ltd</a></li>
    </ul>

  <h3>Web Designer</h3>
    <ul>
      <li>Jean Luca Bez</li>
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
