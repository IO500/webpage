<?php $this->assign('title', 'Decision Process'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('DECISION PROCESS'), ['controller' => 'pages', 'action' => 'display', 'rules-decision']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Decision Process</h3>

    <p>
        Decision making is solely limited to the committee members. The committee uses a simple majority vote decision process with each committee member having equal value. For an even committee size, for example, six people, four must agree for a decision to be implemented. For an odd committee size, for example, five people, three must agree for a decision to be implemented. A committee member can choose to abstain directly or implicitly through inaction. 
    </p>

    <p>
        New items can be brought up for a vote with one committee member proposing the item and then a second agreeing it is ready for a vote. Any item not given a second must wait until the next board meeting before being brought up for a vote again.
    </p>

    <p>
        Voting periods are for up to 14 days from the announcement at the committee meeting and/or other communication venues with a copy to the committee email. Any votes not expressed by the end of that period are considered an abstain. Voting methods can be verbal in meetings, via an approval list at the top of the document, via communication mechanisms, or via an anonymized poll, such as an anonymized Google Form. Regardless of the voting method, the voting result must be documented in writing. The voting method is chosen by the submitter for a new idea or by approximate group decision. Any disagreement about voting form would default to an anonymized technique. Any resulting document must be annotated with when the committee decided to approve or deny the proposal. Actual vote counts and votes are not necessarily public information or even available to the committee based on the voting approach used.
    </p>

    <p>
        <em>Exception</em>: Changes to these rules require a super-majority of two-thirds, round up except in cases where rounding up would require unanimous consent, must agree.
    </p>

    <p>
        <em>Exception</em>: Major benchmark changes require a super-majority of two-thirds, round up except in cases where rounding up would require unanimous consent, must agree.
    </p>

    <p>
        <em>Exception</em>: Adding a committee member requires a super-majority of two-thirds, round up except in cases where rounding up would require unanimous consent, must agree.
    </p>

    <p>
        <em>Exception</em>: Removing a committee member requires a super-majority of two-thirds, round up except in cases where rounding up would require unanimous consent, must agree.
    </p>

    <p>
        <em>Exception</em>: General website (not rules or organizing documents) updates requires two reviewers other than the submitter to approve.
    </p>

    <p>
        <em>Exception</em>: Critical bug fixes to the code requires two reviewers other than the submitter.
    </p>
</div>
