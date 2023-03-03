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
        <li><strong>IOHard</strong>: Applications that require a random workload</li>
        <li><strong>MDEasy</strong>: Metadata/small objects</li>
        <li><strong>MDHard</strong>: Small files (3901 bytes) in a shared directory</li>
        <li><strong>Find</strong>: Finding relevant objects based on patterns</li>
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
