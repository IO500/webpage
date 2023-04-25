<?php $this->assign('title', 'Submission'); ?>

<div class="submissions index content">

<div class="content">
    <p class="call">
        Submissions are now open for ISC23.
    </p>
    <p class="call">
        Stabilization Period: Monday, April 3rd - Friday, April 14th, 2023
        Submission Deadline: Tuesday, May 16th, 2023 AoE
    </p>

    <h2>Call for Submissions</h2>

    <p>
        The IO500 <b>is currently</b> accepting submissions for the
        upcoming 12th semi-annual IO500 list in conjunction with ISC'23.
        Submissions for the 10 Node Challenge are encouraged to share
        small scale storage system results.
        The new ranked lists will be announced during
        <?php echo $this->Html->link(__('"The IO500 and the Virtual Institute of I/O" BoF'),
            [ 'controller' => 'pages', 'action' => 'display', 'bof-sc23' ],
            [ 'class' => 'link' ]);
         ?>.
         We hope to see many new results.
    </p>
    <p>
        The github repo has a new tag <code>io500-isc23</code> for the current
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
        The IO500 list is released during ISC and SC.
        Submissions to the upcoming list can be made all year. However,
        <strong>to be included in the next submission</strong>, we must receive
        the submission before the deadline listed above, unless you have
        previously contacted the committee and approved an extension for
        exceptional circumstances.
    </p>

    <h3>Production and Research Lists</h3>
    <p>
        Starting with ISC'22, we proposed a separation of the list into
        separate
            <?php echo $this->Html->link(__('Production and Research lists'),
                [ 'controller' => 'pages', 'action' => 'display',
                  'the-lists' ], [ 'class' => 'link' ]);
             ?>.
        This better reflects the
        important distinction between storage systems that run in production
        environments and those that may use more experimental hardware and
        software configurations.  At ISC'23, we will formally create these
        two lists and users will be able to submit to either of the two lists
        (and their 10 client-node counterparts).
        Please see the requirements for each list on the
            <?php echo $this->Html->link(__('IO500 Submission Rules page'),
                [ 'controller' => 'pages', 'action' => 'display',
                  'rules-submission' ], [ 'class' => 'link' ]);
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
            Use our new <a href="https://io500.org/submission" target="_blank" class="link">online form</a>.
            Users can create accounts and then update and manage all of their
            submissions through that account.  As part of this new tool, we
            have improved the submission fields that describe the hardware and
            software of the system under test. For reproducibility and analysis
            reasons, we now made the easily obtainable fields mandatory -
            data from storage servers are for users often difficult to obtain,
            therefore, most remain optional. As a new system, there may be
            quirks, please reach out on Slack or the mailing list if you see
            any issues.
        </li>
        <li>
            If you experience problems with the online form that cannot be
            resolved via Slack, please send the committee an
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
        We will publish all data submitted, so by submitting the information you <strong>give us the right to publish the uploaded data</strong>.
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
