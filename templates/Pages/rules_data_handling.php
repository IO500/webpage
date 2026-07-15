<?php $this->assign('title', 'Submission Data Handling'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('SUBMISSION DATA HANDLING'), ['controller' => 'pages', 'action' => 'display', 'rules-data-handling']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Submission Data Handling Policy</h3>

    <p>
        IO500 values your privacy. This policy describes how we collect, use, and disclose information obtained via the IO500 submission website.
    </p>

    <h4>Information We Collect</h4>

    <p>
        When you register for an account and submit to the IO500, we may collect:
    </p>

    <ul>
        <li>
            <b>Identity and Contact Data:</b> Name and email address. This information is only accessed by the IO500 Steering Committee (and other committee members such as the website chair) for use in contacting submitters on matters related to the IO500 benchmark.
        </li>
        <li>
            <b>Submission Data:</b> All related submission data that is voluntarily entered for a submission. This information includes (but is not limited to):
            <ul>
                <li>Institution</li>
                <li>Vendor</li>
                <li>All relevant server, storage, network details</li>
                <li>All relevant software details</li>
                <li>IO500 execution script</li>
                <li>IO500 execution output score information</li>
            </ul>
        </li>
    </ul>

    <h5>Submission Data Handling</h5>

    <p>
        All submission data is published on the IO500 website (or other utilized sites such as GitHub) and is fully available to the public with no barrier to access.
    </p>

    <p>
        IO500 retains world-wide, irrevocable, non-exclusive, and royalty-free permission to use, reproduce, and modify the submission data as part of list publication, data retention and backup, research, publication, and other uses.
    </p>

    <h4>Data Retention and Security</h4>

    <ul>
        <li>
            <b>Retention:</b> All data is kept for as long as a submission exists on any one of the IO500 lists. For technical reasons, the IO500 git repository log may contain Submission Data forever.
        </li>
        <li>
            <b>Security:</b> All reasonable safeguards are employed (e.g., authentication) to protect access to all Identity and Contact Data as well as ensure all Submission Data is not maliciously tampered with or altered.
        </li>
    </ul>

    <h4>Data Update and Removal</h4>

    <p>
        At any time, a submitter (or an official contact of the institution acting on behalf of the submitter) may request anyone of the following:
    </p>

    <ul>
        <li>
            <b>Access/Correction:</b> Update Identity, Contact, and Submission data.
        </li>
        <li>
            <b>Erasure:</b> Removal of Identity, Contact, and Submission data.
        </li>
    </ul>

    <p>
        All requests will be answered by the IO500 Steering Committee within a reasonable time period. Ideally, the requester is identified by the name and email address of the original submission. If the original submitter is no longer available, and either the institution or vendor seeks to update/remove information, please contact the IO500 Steering Committee (committee@io500.org) to work on first updating the Identity and Contact information to the person that will request the updates.
    </p>

    <h4>Changes to This Policy</h4>

    <p>
        The IO500 reserves the right to update this policy periodically. If significant changes are made, we will notify the community via a prominent notice on primary communication channels.
    </p>
</div>
