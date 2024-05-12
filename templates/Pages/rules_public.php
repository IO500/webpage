<?php $this->assign('title', 'Decision Process'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('PUBLIC'), ['controller' => 'pages', 'action' => 'display', 'rules-public']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Public Facing Information Related Rules</h3>

    <p>
        The committee governs itself with the following rules:
    </p>

    <ol>
        <li>
            All requests for media interviews are discussed by the full committee.
        </li>
        <li>
            There are two official channels of communication for the IO500: the email address committee@io500.org and the Slack #general channel.
        </li>
        <li>
            Official IO500 announcements, policies, statements, or decisions should be announced on all official channels as well as optional channels, such as X/Twitter.
        </li>
        <li>
            All communication from official channels must be approved following the decision process. This may include delegating approval for communication for this issue without requiring additional approvals for follow-ups as part of the conversation.
        </li>
        <li>
            The X/Twitter handle can be used without pre-approval to advertise IO500 and to rebroadcast any official statements issued from the Email Address. Retweets of news reports including IO500 and other IO500 mentions do not require committee approval.
        </li>
        <li>
            Any and all communications from individual committee members are merely expressions of their personal opinion and represent neither official positions nor opinions of the IO500. When committee members reply as individuals to questions asked about official IO500 policies, they must clarify somehow that this isn't an official statement. This covers face-to-face conversations, conversations in slack, social media such as LinkedIn and Facebook, and all other communication methods not explicitly mentioned elsewhere in these rules.
        </li>
        <li>
            All lists of names should follow alphabetical order.
        
            <ul>
                <li>
                    For casual material, any name ordering is fine;
                </li>
                <li>
                    For official purposes, last name ordering should be used;
                </li>
                <li>
                    Bibtex, any documentation about the list or the benchmarks should use {author: IO500 Committee; editors: alpha names by last};
                </li>
                <li>
                    For academic publishing (e.g., analysis of the list), name order should follow contribution effort. If equal contributions, then follow the other rules.
                </li>
            </ul>
        </li>
    </ol>

    <p>
        The committee can be reached at <a href="mailto:committee@io500.org" class="link">committee@io500.org</a>.
    </p>
</div>
