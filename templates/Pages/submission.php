<?php $this->assign('title', 'Submission'); ?>

<div class="submissions index content">

<div class="content">
    <p class="call">
        Stabilization Period: Monday, April 3rd - Friday, April 14th, 2023<br/>
        Submission Deadline: Tuesday, May 16st, 2023 AoE
    </p>

    <h2>Call for Submissions</h2>

    <p>
        The IO500 <b>will soon</b> accepting submissions for the
        upcoming 12th semi-annual IO500 list in conjunction with <strong>ISC'23</strong>.
        Submissions for the 10 Node Challenge are encouraged to share
        small scale storage system results.
    </p>

    <h2>How to Submit?</h2>

    <p>
        This page contains the information about the submission procedure.
        First, you need to
        <?php echo $this->Html->link(_('run the benchmark'),
            [ 'controller' => 'Pages', 'action' => 'display',
              'running'
            ], [ 'class' => 'link' ]);
         ?>
        .
    </p>

    <p>
        The IO500 list is released during ISC and SC. See our
        <?php echo $this->Html->link(_('call for submissions'),
            [ 'controller' => 'Pages', 'action' => 'display',
              'cfs-isc23'
            ], [ 'class' => 'link' ]);
         ?>
        page for details.
        Submissions to the upcoming list can be made all year. However,
        <strong>to be included in the next submission</strong>, we must receive
        the submission before the deadline listed in our call for submissions.
    </p>

    <h3>Submission Instructions</h3>

    <p>
        There is now a new IO500 submission tool that improves the overall submission experience.
    </p>

    <p>
        Users can create accounts and then update and manage all of their submissions through that account. As part of this new tool, we have improved the submission fields that describe the hardware and software of the system under test. For reproducibility and analysis reasons, we now made the easily obtainable fields mandatory - data from storage servers are for users often difficult to obtain, therefore, most remain optional.
    </p>

    <ul>
        <li>Go to our new submission system (click on button below)</li>
        <li>Click on "Register" to create a new account</li>
        <li>You will receive an email to activate your account (also check your span folder)</li>
        <li>Once your account is activated you can login</li>
        <li>Go to the "New Submission" menu</li>
        <li>Complete the submission process with all the required information</li>
        <ul>
            <li>You will be able to incrementally complete the submission (i.e., your progress will be saved)</li>
            <li>You will be able to edit your submission until you send it for review</li>
            <li>Once you double-check your submission, click on "Submit" for the IO500 committee to review it</li>
        </ul>
    </ul>

    <p class="center">
        <?php echo $this->Html->link("IO500 Submission System",
            'https://submission.io500.org',
            [ 'class' => 'button-highlight', 'target' => '_blank']);
        ?>
    </p>

    <p>
        As a new system, there may be quirks, please reach out on Slack or the mailing list if you see any issues.
    </p>

    <h3>Handling of the Submitted Data</h3>

    <p>
        Until the next release of the list, the submission committee will
        handle all submitted data confidentially. That means that we will not
        disclose any submitted data to individuals/companies, or institutions.
    </p>

    <h4>Privacy</h4>

    <p>
        We will publish all data submitted, so by submitting the information you <strong>give us the right to publish the uploaded data</strong>.
    </p>

    <h4>Submitter Name</h4>

    <p>
        Submissions will be visible immediately to the members of the
        <?php echo $this->Html->link(_('IO500 Steering Committee'),
            [ 'controller' => 'Pages', 'action' => 'display',
              'steering'
            ], [ 'class' => 'link' ]);
         ?>.
        If there is sensitivity about early visibility to your results
        being seen by any of the committee, please feel free to email
        results privately to a subset of the committee (i.e. do not use
        the official submission tools if you have privacy concerns).
    </p>

    <p>
        Starting with the SC'18 list, submissions include the name of the submitter (or team) to give them the credit they deserve to execute the benchmark; this can be opted out.
    </p>

    <h4>Annonymity</h4>

    <p>
        With the online form, the submitter is able to individually opt-out the submission the name of the submitter/team (this will be then an anonymous submission)
    </p>

    <h3>Previous Call for Submissions</h3>

    <ul class="cfs-list">
        <li>
            <?php echo $this->Html->link("SC'22 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-sc22' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
        <li>
            <?php echo $this->Html->link("ISC'22 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-isc22' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
        <li>
            <?php echo $this->Html->link("SC'21 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-sc21' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
        <li>
            <?php echo $this->Html->link("ISC'21 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-isc21' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
    </ul>
</div>
