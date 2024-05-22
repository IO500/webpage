<?php $this->assign('title', 'Submission'); ?>

<div class="submissions index content">

<div class="content">
    <h2>Call for Submissions</h2>

    <p>
        The IO500 <strong>is now</strong> accepting and encouraging submissions
        for the upcoming 14th semi-annual IO500 lists, in conjunction with
        <strong>ISC'24</strong>.  Once again, we are also accepting submissions
        to the 10 Client Node Challenge to encourage the submission of small
        scale results.  The new ranked lists will be announced at the
        <?php echo $this->Html->link(__('"IO500: High Performance Storage
         Community" BoF'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-isc24' ],
            [ 'class' => 'link' ]);
         ?>.
         We hope to see many new results.
    </p>
    <p>
        The github repo has a new tag <code>io500-sc24</code> for the current
        version of the benchmark for this list.
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
        The IO500 list is released during ISC and SC each year.
        Submissions to the upcoming list can be made all year. However,
        <strong>to be included in the next submission</strong>, we must receive
        the submission before the deadline listed above, unless you have
        previously contacted the committee and approved an extension for
        exceptional circumstances.
    </p>

    <h3>Production and Research Lists</h3>
    <p>
        Starting with ISC'23, we implemented a separation of the IO500 list into
        <?php echo $this->Html->link(__('Production and Research lists'),
                [ 'controller' => 'pages', 'action' => 'display',
                  'the-lists' ], [ 'class' => 'link' ]);
         ?>.
        This better reflects the
        important distinction between storage systems that run in production
        environments and those that may use more experimental hardware and
        software configurations.  At ISC'24, we continue to populate these
        two lists and users will be able to submit to either of the two lists
        (and their 10 client-node counterparts).  Please see
        <?php echo $this->Html->link('the requirements for each list',
            [ 'controller' => 'pages', 'action' => 'display', 'the-lists' ],
            [ 'class' => 'link' ]);
        ?> and the
        <?php echo $this->Html->link('IO500 submission rules page',
            [ 'controller' => 'pages', 'action' => 'display', 'rules-submission' ],
            [ 'class' => 'link' ]);
        ?>.
    </p>

    <h3>Reproducibility Questionnaire</h3>
    <p>
        Every submission will now receive a reproducibility score based upon
        the provided system details and the reproducibility questionnaire.
        This score will inform the community on the amount of details provided
        in the submission and the obtainability of the storage system.
        Further, this score will be used to evaluate if a submission is
        eligible for the Production list.
    </p>

    <h3>Submission Instructions</h3>
    <p>
        There are two options to submit to the IO500, we strongly prefer
        the online form:
    </p>

    <ol>
        <li>
            Use our <a href="https://submission.io500.org/login"
               target="_blank" class="link">online form</a>.
            Users can create accounts and then update and manage all of their
            submissions through that account.
            <ol>
                <li>
                    Click on "[Register]" to create a new account
                </li>
                <li>
                    You will receive an email to activate your account
                    (also check your spam folder)
                </li>
                <li>
                    Once your account is activated you can [Login]
                </li>
                <li>
                    Go to the "[New Submission]" menu
                </li>
                <li>
                    Complete the submission form with all required information
                </li>
                <ul>
                    <li>
                        You will be able to incrementally complete the
                        submission (i.e., your progress will be saved)
                    </li>
                    <li>
                        You are able to edit your submission until you submit it
                    </li>
                    <li>
                        Once you double-check your submission data, click on
                        "[Submit]" to send it to the IO500 committee for review
                    </li>
                </ul>
            </ol>

            As part of this new tool, we
            have improved the submission fields that describe the hardware and
            software of the system under test. For reproducibility and analysis
            reasons, we now made the easily obtainable fields mandatory -
            data from storage servers are for users often difficult to obtain,
            therefore, most remain optional.
            <p>
                As a new system, there may be quirks, please reach out on
                Slack or the mailing list if you see any issues.
            </p>
        </li>
        <li>
            If you experience problems with the online form, please reach out on
            <a href="https://join.slack.com/t/io500workspace/shared_invite/zt-j3i9c00k-niCcUHisgLT2JluYhcxlQQ" class="link">Slack</a>
            to see if this can be resolved quickly.  Alternately, send an
            <a href="mailto:submit@io500.org" class="link">email</a> with
            the following as attachments:
            <ul>
                <li>The (potentially) adapted <span class="code">io500.sh</span>
                </li>
                <li>The output directory of the benchmark (variable
                    <span class="code">io500_result_dir</span> in
                    <span class="code">io500.sh</span>).
                </li>
                <li>If possible, please mention which system is covered of the
                    <a href="https://www.vi4io.org/hpsl/start" class="link">CDCL</a>
                    or provide system information such that we can add the
                    system to the CDCL!
                </li>
            </ul>
            <p>
                We will reply to you, to confirm reception and to ask any
                question that may arise.
            </p>
        </li>
    </ol>

    <h3>Handling of the Submitted Data</h3>

    <p>
        Until the next release of the list, the submission committee will
        handle all submitted data confidentially. That means that we will not
        disclose any submitted data to individuals/companies, or institutions.
    </p>

    <h4>Privacy</h4>

    <p>
        We will publish all data submitted, so by submitting the information
        you <strong>give us the right to publish the uploaded data</strong>.
    </p>

    <h5>Submitter Name</h5>

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
        Starting with the SC'18 list, submissions include the name of the
        submitter (or team) to give them the credit they deserve to execute
        the benchmark; this can be opted out.
    </p>

    <h4>Annonymity</h4>

    <p>
        With the online form, the submitter is able to individually opt-out
        the submission the name of the submitter/team (this will be then an
        anonymous submission).
    </p>

    <h3>Previous Calls for Submissions</h3>

    <ul class="cfs-list">
        <li>
            <?php echo $this->Html->link("ISC'24 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-isc24' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
        <li>
            <?php echo $this->Html->link("SC'23 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-sc23' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
        <li>
            <?php echo $this->Html->link("ISC'23 CFS",
                [ 'controller' => 'pages', 'action' => 'display', 'cfs-isc23' ],
                [ 'class' => 'button' ]);
             ?>
        </li>
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
