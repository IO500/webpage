<?php $this->assign('title', 'Rules'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
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
            &mdash; rules for executing the IO500 bechmark
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
            &mdash; rules for executing the IO500 benchmark for the Student Cluster Competition
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
        <li>
            <b>
                <?php
                echo $this->Html->link(__('IO500 Foundation New Role Creation'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'foundation-new-roles'
                ]);
                ?>
            </b>
            &mdash; how to create new volunteer roles
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('IO500 Foundation Additional Roles'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'additional-roles'
                ]);
                ?>
            </b>
            &mdash; how to create new volunteer roles
        </li>

    </ul>
</div>
