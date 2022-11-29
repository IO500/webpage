<?php $this->assign('title', 'Student Cluster Competition'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('SCC SUBMISSION'), ['controller' => 'pages', 'action' => 'display', 'rules-scc-submission']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>Submission Student Cluster Competition Rules</h3>

    <p>
        Please refer to the 
        <?php echo $this->Html->link(__('IO500 Submission Rules'),
            [ 'controller' => 'pages', 'action' => 'display',
              'rules-submission'
            ], [ 'class' => 'link' ]);
        ?>
        all rules are in effect with three exceptions:
    </p>

    <ol>
        <li>
            Instead of a 300 second stonewall requirement, for the student cluster competition, the required stonewall time is reduced to 30 seconds.
        </li>
        <li>
            If you use only a single client node, then you must set <span class="code">drop-caches = TRUE</span> and you must run with sudo permissions.
        </li>
        <ul>
            <li>
                We will not accept submissions whose performance was artificially inflated by caching.
            </li>
        </ul>
        <li>
            You must set the variable <span class="code">scc = TRUE</span>.
        </li>
    </ol>

    <p>
        The IO500 committee is excited about your participation and are ready to answer any questions that you have. The valid scores will be published at io500.org so best wishes to you and good luck in achieving excellent scores!
    </p>
</div>
