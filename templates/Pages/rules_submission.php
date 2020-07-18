<?php $this->assign('title', 'Submission Rules'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('SUBMISSION'), ['controller' => 'pages', 'action' => 'display', 'rules-submission']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>Submission Rules</h3>

    <p>
        The following rules should ensure a fair comparison of the IO-500 results between systems and configurations. They serve to reduce mistakes and improve accuracy.
    </p>

    <ol>
        <li>
            The latest version of <span class="code">io500.sh</span> in GitHub must be used and all binaries should be built according to the included build instructions.</li>

            <p class="code-block">
                $ git clone https://github.com/VI4IO/io-500-dev.git -b io500-sc-19                
            </p>
        </li>
        <li>
            All required phases must be run and in the same order as they appear in the <span class="code">io500.sh</span> script.
        </li>
        <li>
            Read-after-write semantics: The system must be able to correctly read freshly written data from a different client after the close operation on the writer has been completed.
        </li>
        <li>
            All create phases should run for at least 300 seconds; the stonewall flag must be set to 300 which should ensure this.
        </li>
        <ul>
            <li>
                We defined a very high workload for all benchmarks that should satisfy this requirement but you may have to set higher values.
            </li>
        </ul>
        <li>
            There can be no edits made to the <span class="code">io-500.sh</span> script beyond changing the allowed variables and adding commands to configure the storage system (e.g. setting striping parameters).
        </li>
        <ul>
            <li>
                For example, there can be no artificial delays added within the script such as calling <span class="code">sleep</span> between phases.
            </li>
            <li>
                No edits are allowed to the <span class="code">utilities/io500_fixed.sh</span> scripts.
            </li>
        </ul>
        <li>
            The file names for the mdtest and IOR output files may not be pre-created.
        </li>
        <li>
            You must run the benchmark on a single storage system.
        </li>
        <li>
            All data must be written to persistent storage within the measured time for the individual benchmark,e.g. if a file system caches data, it must ensure that data is persistently stored before acknowledging the close.
        </li>
        <li>
            Submitting the results must be done in accordance with the instructions on our submission page.
        </li>
        <li>
            If a tool other than the included pfind is used for the find phase, then it must follow the same input and output behavior as the included pfind.
        </li>
        <li>
            Please also refer to the <span class="code">README</span> documents in the github repo.
        </li>
        <li>
            Please read the <span class="code">CHANGELOG.md</span> file for the new changes on the IO-500 benchmark
        </li>
        <li>
            For the 10 node challenge, there must be exactly 10 physical nodes and at least one benchmark process must run on each
        </li>
        <ul>
            <li>Virtual machines can be used but the above rule must be followed. More than one virtual machine can be run on each physical node.</li>
        </ul>
    </ol>

    <p>
        Please send any requests for changes to these rules or clarifying questions to our mailing list.
    </p>

    <h4>Allowed Modifications</h4>

    <p>
        Inside the <span class="code">io500.sh</span> script you can make the modifications as indicated by the script, in particular these are:
    </p>

    <ol>
        <li>
            In the <span class="code">setup_directories()</span> function, change in which directory to run and set directory options (e.g. using tools such as <span class="code">lfs_setstripe</span> or <span class="code">beegfs_ctl</span> to specify different stripe size for the IOR easy directory and the IOR hard directory) Each of the four main phases (IOR easy and hard, and mdtest easy and hard) has a subdirectory on which these various options can be set; however, additional subdirectories within these subdirectories cannot be created.
        </li>
        <li>
            In <span class="code">setup_paths()</span> set the MPI arguments.
        </li>
        <li>
            In <span class="code">setup_find()</span>, you can choose the application that performs the find.
        </li>
        <li>
            In <span class="code">extra_description()</span>, you can add all the variables about the system information; this is useful when conducting many runs. While we query this information as well in the web submission, the web submission will read any value from the script.
        </li>
        <li>
            Running with a stricter semantics such as <span class="code">O_DIRECT</span> is allowed.
        </li>
        <li>
            In the <span class="code">setup_ior</span>, <span class="code">mdtest_easy</span>, <span class="code">mdtest_hard</span> functions you can set the arguments for running the benchmarks. Details of allowed options are provided inside the script. As a rule of thumb, the hard benchmarks tolerate only options that do not change the access pattern. The easy patterns allow more changes as the intention is to show best-case performance (without explicit caching).
        </li>

        <p>
            Please email the mailing list or the steering board for any clarifications.
        </p>
    </ol>

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
