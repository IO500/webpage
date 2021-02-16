<?php $this->assign('title', 'IO500 Foundation New Roles'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('COMMITTEE'), ['controller' => 'pages', 'action' => 'display', 'rules-committee']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>IO500 Foundation New Roles Rules</h3>

    <p>
        The IO500 Foundation can create new roles with the following rules:
    </p>

We expand the IO500 Foundation to include a new class of members separate from the Committee. Generally, we consider that any member of the IO500 foundation is crucial to the operation and the reputation of the IO500 foundation, therefore, the rules are formulated in favor of a conservative and protective strategy. 

The occupants of these additional roles are officially announced on the “about” page beneath the Committee.

Salary

As with all roles with IO500 Foundation, this is an unpaid position.


    <p>
        The committee can be reached at <a href="mailto:committee@io500.org"><span class="code">committee@io500.org</span></a>.
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
