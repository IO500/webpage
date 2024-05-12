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
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <p>
        The IO500 Steering Committee (hereafter "committee" or also referred to as the "board") is the operational group for the IO500 Foundation, a 501(c)3 public charity corporation in New Mexico, USA. The IO500 Foundation operates as a standards body seeking to support the improvement of high performance computing storage systems and to serve as a repository of detailed system information as a public research repository documenting large scale storage system evolution over time. To collect the data, the committee operates a twice annual competition coinciding with SC (November) and ISC (May). The committee consists of a small group, and optionally, sub-committees focused on particular activities. The committee manages all of the day to day operations, operates the competitions, and oversees the activities of any sub-committee(s).
    </p>

    <h3>Current Committee Members</h3>

    <p>
        <ul>
            <li>Andreas Dilger</li>
            <li>Dean Hildebrand</li>
            <li>Julian Kunkel</li>
            <li>Jay Lofstead</li>
            <li>George Markomanolis</li>
        </ul>
    </p>

    <h3>Rules</h3>

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
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Major Benchmark Change Request/Proposal'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-benchmark'
                ]);
                ?>
            </b>
        </li>
    </ul>

    <ul>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Committee Size and Members'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-committee'
                ]);
                ?>
            </b>
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Decision Process'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-decision'
                ]);
                ?>
            </b>
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('New Committee Member Process'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-committee-member'
                ]);
                ?>
            </b>
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Public Facing Information Related Rules'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-public'
                ]);
                ?>
            </b>
        </li>
        <li>
            <b>
                <?php
                echo $this->Html->link(__('Sub-Committees'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-sub-committees'
                ]);
                ?>
            </b>
        </li>

    </ul>
</div>