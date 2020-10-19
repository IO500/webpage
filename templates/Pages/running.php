<?php $this->assign('title', 'Running'); ?>

<div class="landing landing-running">
    <h1><?php echo __('Run IO500') ?></h1>

    <p>
        You can download <b>IO500</b> from the <b>GitHub</b> repository. Follow the instructions in this page to install, configure, and run the benchmark!
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Get IO500'), 'https://github.com/IO500/io500', [
                'class' => 'button-highlight'
            ]);
            ?>
        </li>
    </ul>

    <p class="note">
        Thanks for your participation and good luck!
    </p>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>

<div class="content">
    <h3>Preparation</h3>

    <p>The IO500 source code is available at Github:</p>

    <p class="code-block">
        $ git clone https://github.com/IO500/io500.git -b io500-sc20<br/>
        $ cd io500<br/>
        $ ./prepare.sh<br/>
    </p>

    <h3>Installation</h3>

    <p>
        We know that the library libcircle which is required for the pfind test is not easy to get compiled on Cray systems.It is required to modify the configure file to avoid verifying the MPI version by options such as <span class="code">--showme</span> that do not exist on Cray MPI. Check also https://github.com/hpc/libcircle/issues/27
    </p>

    <p>
        A video with the installation procedure is here.
    </p>

    <h3>Steps</h3>

    <ol>
        <li>
            Create a job submission script (if applicable) to execute the <span class="code">io500.sh</span> script which is located in the <span class="code">io500</span> folder. Provide enough execution time (typically 2h would be enough for the full run) and adjust the reserved resources.
        </li>
        <li>
            Edit the <span class="code">io500.sh</span> file to set allowed parameters, and create a .ini file using "<span class="code">./io500 --list &gt; myconfig.ini</span>" and edit available parameters. Remember that you need to execute all the mandatory tests for a valid submission.
            <ul>
                <li>
                    Adjust the variables io500_mpirun and to <span class="code">io500_mpiargs</span> according to your system and test case.
                </li>
                <li>
                    Then the following variables could be adjust <span class="code">io500_ior_easy_size</span>, <span class="code">io500_ior_easy_params</span>, <span class="code">io500_mdtest_easy_files_per_proc</span>, <span class="code">io500_ior_hard_writes_per_pro</span>, <span class="code">io500_mdtest_hard_files_per_proc</span> in order to achieve the minimum of 5 minutes executing for IOR easy/hard write, and mdtest easy/hard/write.
                </li>
                <li>
                    You can add system-specific information to the script, otherwise you can provide it during upload. The info creator helps to create the required output.
                </li>
            </ul>
        </li>
        <li>
            Execute your submission job script that runs the
	    "<span class="code"> io500.sh myconfig.ini</span>" script.
        </li>
        <li>
            Verify that all the results are valid.
        </li>
        <li>
            Submit your results, see <a href="https://www.vi4io.org/io500/submission/start">https://www.vi4io.org/io500/submission/start</a>.
        </li>
    </ol>

    <p>
        A video with the execution and tuning procedure is
	<a href="https://www.youtube.com/watch?v=FRTK9KwPCmg" class="link">here</a>.
    </p>
    <p>
        When you modify tunables check that the changes are allowed according to the
                <?php
                echo $this->Html->link(__('IO500 Submission Rules'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules-submission'
                ]);
                ?>.
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
