<?php $this->assign('title', 'Code of Conduct'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('CODE OF CONDUCT'), ['controller' => 'pages', 'action' => 'display', 'rules-code-of-conduct']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Code of Conduct Policy</h3>

    <p>
        The IO500 Steering Committee is committed to making the IO500 community a pleasant and harassment-free experience for everyone. We welcome all participants and do everything we can to foster an open, inclusive, and healthy environment.
    </p>

    <h4>Positive Engagement</h4>

    <p>
        We encourage behaviors that strengthen our community, such as:
    </p>

    <ul>
        <li>
            <b>Practicing empathy:</b> Treating others with genuine kindness.
        </li>
        <li>
            <b>Respecting diversity:</b> Valuing differing opinions, viewpoints, and lived experiences.
        </li>
        <li>
            <b>Constructive feedback:</b> Giving and gracefully accepting honest input.
        </li>
        <li>
            <b>Accountability:</b> Apologizing for mistakes, making amends, and learning from the experience.
        </li>
        <li>
            <b>Community-first mindset:</b> Prioritizing the collective well-being over individual interests.
        </li>
    </ul>

    <h4>Unacceptable Behavior</h4>

    <p>
        The following actions are strictly prohibited:
    </p>

    <ul>
        <li>
            <b>Sexualized content:</b> Use of sexualized language, imagery, or unsolicited advances.
        </li>
        <li>
            <b>Hostility:</b> Trolling, insulting comments, or personal and political attacks.
        </li>
        <li>
            <b>Harassment:</b> Any form of public or private harassment.
        </li>
        <li>
            <b>Privacy violations:</b> Sharing others' private information without explicit permission.
        </li>
        <li>
            <b>Unprofessionalism:</b> Any conduct deemed inappropriate for a professional setting.
        </li>
    </ul>

    <p>
        This code applies within all IO500 community spaces, including (but not limited to) community meetings, BOFs, email, Slack, and social media platforms. Any violation of the code should be forwarded to the IO500 Steering Committee, which will investigate thoroughly and take action if deemed appropriate. Actions may include, but are not limited to, warnings, removal from IO500 community spaces, and banishment from submitting to IO500 for a period of time (or even indefinitely).
    </p>

    <h4>Changes to This Policy</h4>

    <p>
        The IO500 reserves the right to update this policy periodically. If significant changes are made, we will notify the community via a prominent notice on primary communication channels.
    </p>
</div>
