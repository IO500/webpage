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


<h3>Web Designer</h3>

    Responsibilities
    <ol>
        <li>The responsibilities include maintaining website working status and working on requested changes as driven by issues submitted to the Github site for the website. These issues can be submitted by anyone including the community, Committee, and the Web Designer themselves.</li>

        <li>The Web Designer will have access to IO500 submission prior to public disclosure as part of performing their duties and is required to guarantee the confidentiality of those submissions on penalties including immediate dismissal.</li>

        <li>The Web Designer is required to share with the committee all relevant passwords and accounts as they are created and/or changed.</li>
        </ol>

        Management structure
        <ol>
        <li>The Web Designer reports to the whole Committee using the GitHub issues and the dedicated Slack channel.</li>

        <li>The Web Designer will not be allowed or asked to vote on any Committee issues.</li>

        <li>The Web Designer will not have access to the shared IO500 Google Drive, nor the meeting minutes since they include sensitive information.</li>

        <li>This Web Designer’s Slack access will be limited to a new private slack channel dedicated to the role and will not have access to the other private Committee channels except as deemed necessary based on future Committee unanimous consent. </li>

        <li>The role is perpetual unless the person resigns. At any time, if one Committee member has a concern with the position, they can discuss the matter in a timely fashion with the Committee, if the concerns of the Committee member cannot be resolved in the Committee discussion, the current Web Designer is removed immediately based on a majority vote. Prior to notifying the web designer, all passwords and password recovery methods must be changed/verified to remove the web designer’s access. This would include the webpage github, hosting, disqus, email lists, slack, and any other related functions.</li>
    </ol>

    Salary
    <ol>
        <li>As with all roles with IO500 Foundation, this is an unpaid position.</li>
    </ol>

    <p>
        The committee can be reached at <a class="link" href="mailto:committee@io500.org"><span class="code">committee@io500.org</span></a>.
    </p>
</div>
