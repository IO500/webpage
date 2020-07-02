<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>Rules</h2>

    <p>
        Based on the community feedback, the committee provides rules for:
    </p>

    <ul>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Submission'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-submission'
                ]);
                ?>
            </b>
            &mdash; rules for executing the IO-500 bechmark
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('SCC Submission'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-scc-submission'
                ]);
                ?>
            </b>
            &mdash; rules for executing the IO-500 benchmark for the Student Cluster Competition
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Process to Modify the Benchmark'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-benchmark'
                ]);
                ?>
            </b>
            &mdash; that includes change requests but also the inclusion of additional benchmarks
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Internal Committee Rules'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-committee'
                ]);
                ?>
            </b>
            &mdash; the operation of the committee
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Committee Membership'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-membership'
                ]);
                ?>
            </b>
            &mdash; how the committee membership changes
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