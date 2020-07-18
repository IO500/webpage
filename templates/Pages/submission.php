<?php $this->assign('title', 'Submission'); ?>

<div class="releases index content">
    <h2>Submission</h2>

    <div class="releases-action">
        <?php
        echo $this->Html->link(_('Call for Submission'), [
            'controller' => 'Pages',
            'action' => 'display',
            'cfs'
        ], [
            'class' => 'button'
        ]);
        ?>
    </div>

    <div class="both"></div>

    <p>
        This page contains the information about the submission procedure.
    </p>

    <p>
        The IO-500 list is released during ISC and SC. See our call for submissions. Submissions to the upcoming list can be made all year. However, <strong>to be included in the next release</strong>, we must receive the submission until the deadline listed in our call for submissions.
    </p>

    <h3>Submission Instructions</h3>

    <p>
        There are two options to submit to the IO-500, we prefer the online form:
    </p>

    <ol>
        <li>
            Use our <a href="https://www.vi4io.org/io500-submission/" target="_blank" class="link">online form</a>. You have to receive a one-time token (please check your SPAM folder if you did not receive the initial response 5 minutes later).
        </li>
        <li>
            If you experience any problems with the online form; send an <a href="mailto:submit@io500.org" class="link">email</a> with attachments:

            <ul>
                <li>The (potentially) adapted io500.sh</li>
                <li>The output directory of the benchmark (variable io500_result_dir in io500.sh)</li>
                <li>If possible, please mention which system is covered of the <a href="https://www.vi4io.org/hpsl/start" class="link">CDCL</a> or provide system information such that we can add the system to the CDCL!</li>
            </ul>
        </li>
    </ol>

    <p>
        We will reply to you, to confirm reception and any question that may arise.
    </p>

    <h3>Handling of the Submitted Data</h3>

    <p>
        Until the release of the list, the submission committee will handle all submitted data confidentially. That means that we will not disclose any submitted data to individuals/companies, or institutions.
    </p>

    <h4>Privacy</h4>

    <p>
        We will publish all data submitted, so by submitting the information you <strong>give us the right to publish the uploaded data</strong>.
    </p>

    <h5>Submitter Name</h5>

    <p>
        Submissions will be visible immediately to the IO500 Committee which currently is comprised of John Bent, Julian Kunkel, and Jay Lofstead. If there is sensitivity about early visibility to your results being seen by any of the committee, please feel free to email results privately to a subset of the committee (i.e. do not use the official submission tools if you have privacy concerns).
    </p>

    <p>
        Starting with the SC'18 list, releases include the name of the submitter (or team) to give them the credit they deserve to execute the benchmark; this can be opted out.
    </p>

    <h4>Annonymity and Embargo</h4>

    <p>
        With the online form, the submitter is able to individually opt-out or embargo (delay) the release of certain information: 1) The name of the submitter/team (anonymous submission) 2) Specific information that would indicate the system; e.g., the file system, the name of the site, supercomputer...
    </p>

    <p>
        After an embargo period the specific information is revealed and updated automatically in the subsequent list following the end of the embargo period. The period is either 3 years, or after the machine is decommissioned (the embargo period is asked in the online form).
    </p>

    <h3>Preparation</h3>

    <p>
        Fetching, compiling, and running the IO500 Benchmarks is surprisingly straightforward. Although tuning can be challenging. Instructions for the former can be found in our <a href="https://github.com/VI4IO/io-500-dev" target="_blank" class="link">Github repository</a>. Help with the latter can be found in our various communication channels.
    </p>

    <div id="disqus_thread"></div>
</div>

<script>
var disqus_config = function () {
    this.page.url = "<?php echo $this->Url->build($this->request->getRequestTarget(), ['fullBase' => true]); ?>";
    this.page.identifier = "<?php echo $this->Url->build($this->request->getRequestTarget()); ?>";
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://io500.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>