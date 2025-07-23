<?php $this->assign('title', 'About'); ?>

<div class="content">
    <h2>IO500</h2>

    <p>
        The IO500 benchmark has been developed together with the community and its development is still ongoing. The benchmark is essentially a benchmark suite bundled with execution rules. It harnesses existing and trusted open source benchmarks.
    </p>

    <p>
        The goal for the benchmark is to capture user-experienced performance. It aims to be:
    </p>

    <ul>
        <li>Representative</li>
        <li>Understandable</li>
        <li>Scalable</li>
        <li>Portable</li>
        <li>Inclusive</li>
        <li>Lightweight</li>
        <li>Trustworthy</li>
    </ul>

    <h3>Workloads</h3>

    <p>
        The benchmark covers various workloads and computes a single score for comparison. The workloads are:
    </p>

    <ul>
        <li><strong>IOEasy</strong>: Applications with well optimized I/O patterns</li>
            <ul>
            <li><strong>ior-easy-write</strong>:
                Each process creates and writes to one file at the maximum write
                throughput of the storage system. Each process writes the same
                size of file as that of the rank which was able to write the
                most data when the 300s stonewall timer is hit, so that every
                process writes the same amount of data.
            </li>
            <li><strong>ior-easy-read</strong>:
                Each process reads the entirety of one file created by a
                process on a different node during the
                <strong>ior-easy-write</strong> phase.
            </li>
            <li><strong>ior-rnd4k-easy-read</strong>:
                Each process reads random 4k blocks from one file created by
                another process on a different node in the
                <strong>ior-easy-write</strong> phase until the 300s stonewall
                timer is hit.
            </li>
            </ul>
        <li><strong>IOHard</strong>: Applications that require a random workload</li>
            <ul>
            <li><strong>ior-hard-write</strong>:
                Create one shared file and write interleaved 47008-byte records
                to the file at the maximum write throughput of the storage
                system. The number of records written by each process is
                determined by the rank which was able to write the most records
                when the 300s stonewall timer is hit, so that every process
                writes the same amount of data.
            </li>
            <li><strong>ior-hard-read</strong>:
                Each process reads interleaved 47008-byte records from the file
                created by the <strong>ior-hard-write</strong> phase with an
                offset that ensures each node is reading records written by a
                process on a different node.
            </li>
            </ul>
        <li><strong>MDEasy</strong>: Metadata/small objects</li>
            <ul>
            <li><strong>mdtest-easy-write</strong>:
                Each process creates a unique directory and creates zero-byte
                files within that directory at the maximum rate possible.
                Each process creates the same number of files as the rank that
                created the most files when the 300s stonewall timer is hit.
            </li>
            <li><strong>mdtest-easy-stat</strong>:
                Each process fetches the file attributes of the files created
                by a process on a different node during the
                <strong>mdtest-easy-write</strong> phase.
            </li>
            <li><strong>mdtest-easy-delete</strong>:
                Each process deletes all of the files and directory created by
                a process on a different node during the
                <strong>mdtest-easy-write</strong> phase.
            </li>
            </ul>
        <li><strong>MDHard</strong>: Small files (3901 bytes) in a shared directory</li>
            <ul>
            <li><strong>mdtest-hard-write</strong>:
                A single directory is created and each process creates
                3901-byte files with a unique name within that directory at
                the maximum rate possible. Each process creates the same
                number of files as of the rank which was able to write the
                most data within the 300s stonewall time period.
            </li>
            <li><strong>mdtest-hard-stat</strong>:
                Each process fetches the file attributes of the files created
                by a process on a different node during the
                <strong>mdtest-hard-write</strong> phase.
            </li>
            <li><strong>mdtest-hard-read</strong>:
                Each process reads the 3901-byte data of the files created
                by a process on a different node during the previous
                <strong>mdtest-hard-write/-stat</strong> phases.
            </li>
            <li><strong>mdtest-hard-delete</strong>:
                Each process deletes all of the files created by a process on
                a different node during the previous
                <strong>mdtest-hard-write/-stat/-read</strong> phases.
            </li>
            </ul>
        <li><strong>Find</strong>: Finding relevant objects based on patterns</li>
            <ul>
            <li><strong>find-easy</strong>:
                Scans the full set of files created by all of the
                <strong>*-write</strong> phases, and look for files created
                after the <strong>mdtest-easy-write</strong> phase with a
                filename containing the string '01' somewhere within it.
                Reports the total number of such files found.
            </li>
            </ul>
    </ul>

    <p>
        The individual performance numbers are preserved and accessible via the web or the raw data. This allows deriving other relevant metrics.
    </p>

    <p>
        We are in the process to establish a procedure to extend the current workload with further meaningful metrics.
    </p>

    <h3>Further Reading</h3>

    <ul>
        <li>
            <a class="link" href="https://www.vi4io.org/_media/io500/about/io500-establishing.pdf">White paper: Establishing the IO-500 Benchmark</a>
        </li>
        <li>
            <a class="link" href="https://hps.vi4io.org/_media/research/publications/2018/dltvifiatikl18-the_virtual_institute_for_i_o_and_the_io_500.pdf">Poster: The Virtual Institute for I/O and the IO-500</a>
        </li>
        <li>
            See also various presentations on our
            <?php echo $this->Html->link(__('news page'),
	        [ 'controller' => 'pages', 'action' => 'display',
                  'news'
                ], [ 'class' => 'link' ]);
             ?>.
        </li>
    </ul>

    <h3>Using the IO500 Logo</h3>

    <p>
        We welcome the promotion of the IO500 using the logo.
    </p>

    <h4>IO500 Logo License Terms</h4>

    <p>
        The IO500 logo is copyrighted us but may be used under the following conditions:
    </p>

    <ol>
        <li>
            The logo is used for its intended purpose to promote the IO500. You may use it:
            <ol>
                <li>together with results obtained by using the IO500 with statements that you are using the benchmark</li>
                <li>together with opinions about the benchmark</li>
            </ol>
        </li>
        <li>
            The appearance of the logo shall not be modified. You may change the file format and resolution.
        </li>
        <li>
            The logo must be placed onto a white or gray background.
        </li>
    </ol>

    <p>
        If you are in doubt, contact the steering board.
    </p>

    <?php
    echo $this->Html->link(
        __('Download the Logo'),
        '../img/logo.png',
        [
            'class' => 'button'
        ]
    );
    ?>
</div>
