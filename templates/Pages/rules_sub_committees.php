<?php $this->assign('title', 'Rules'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('SUB-COMMITTEES'), ['controller' => 'pages', 'action' => 'display', 'rules-sub-committees']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Sub-Committees</h3>

    <p>
        A sub-committee consists of 1 or more community members and has a committee member liaison. The purpose of a sub-committee is to focus effort on a single project or effort. Resource access, voting rights, and all other matters follow the committee rules and decision process.
    </p>

    <h4>
        Website Maintenance
    </h4>

    <p>
        Sub-committee lead title: Web Designer
    </p>

    <h5>
        Responsibilities
    </h5>

    <ol>
        <li>
            The responsibilities include maintaining website working status and working on requested changes as driven by issues submitted to the Github site for the website. These issues can be submitted by anyone including the community, Committee, and the Web Designer themselves.
        </li>
        <li>
            The Web Designer will have access to IO500 submission prior to public disclosure as part of performing their duties and is required to guarantee the confidentiality of those submissions on penalties including immediate dismissal.
        </li>
        <li>
            The Web Designer is required to share with the committee all relevant passwords and accounts as they are created and/or changed.
        </li>
    </ol>

    <h5>Management Structure</h5>

    <p>
        The Web Designer reports to the whole Committee using the GitHub issues and the dedicated Slack channel.
    </p>

    <p>
        The role is perpetual unless the person resigns.
    </p>

    <p>
        The committee can be reached at <a href="mailto:committee@io500.org" class="link">committee@io500.org</a>.
    </p>
</div>
