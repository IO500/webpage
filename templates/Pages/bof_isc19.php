<?php $this->assign('title', 'Birds-of-a-Feather - ISC 19'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'19"), ['controller' => 'pages', 'action' => 'display', 'bof-isc19']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'19</h2>

    <h3>The IO500 and the Virtual Institute of I/O</h3>

    <table class="tb">
        <thread>
            <th>
                <td></td>
                <td></td>
            </th>
        </thread>
        <tbody>
            <tr>
                <td><strong>Date</strong></td>
                <td>Tuesday, June 18th, 13:45-14:45</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Substanz (1, 2); Frankfurt, Germany</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a class="link" href="https://2019.isc-program.com/?post_type=page&p=11&id=bof116&sess=sess191" target="_blank">Link to the official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for
        HPC storage. Developed two years ago, the IO500 has published three
        official lists so far. A BoF highlight is the presentation of the
        fourth IO500 list.
    </p>

    <p>
        The general purpose of this BoF is to foster the IO500 and VI4IO communities to ensure forward progress towards the common goals of creating, sharing, and benefiting from a large corpus of shared storage data. We also serve as a repository of detailed information about production storage system architectures over time as a knowledge base for other researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are to 1) reveal the current IO500 list and provide highlights and insight; 2) advertise the community hub but also discuss and steer the direction of the community effort; 3) to discuss the benefit and direction of the efforts within the community.
    </p>

    <p>
        The IO500 benchmark consists of data and metadata benchmarks to identify performance boundaries for optimized and suboptimal applications. Together with comprehensive data from sites, supercomputers, and storage, in-depth analysis of system characteristics are tracked by the list and can be analyzed. In contrast to other lists, the IO500 collects the execution scripts for providing means of result verification and sharing best practices for data centers.
    </p>

    <p>
        Goals of the Virtual Institute for I/O are:
    </p>

    <ul>
        <li>Provide a platform for I/O researchers and enthusiasts for exchanging information</li>
        <li>Foster international collaboration in the field of high-performance I/O</li>
        <li>Track, and encourage, the deployment of large storage systems by hosting information about high-performance storage systems</li>
    </ul>

    <p>
        Expected HPC audience are 1) I/O experts from data centers and industry, 2) researchers/engineers working on high-performance I/O for data centers, 3) domain scientists and computer scientists interested in discussing I/O issues.
    </p>

    <p>
        The outcome of this BoF will steer the direction of the community efforts.
    </p>

    <h3>Agenda</h3>

    <p>
        We have a series of interactive talks and discussions.
    </p>

    <ul>
        <li>
            <strong>The Virtual Institute for I/O</strong> – <em>Julian Kunkel</em>
        </li>
        <li>
            <strong>What's new with IO500</strong> – <em>George Markomanolis</em> 
        </li>
        <li>
            <strong>Community lightning talks</strong> (5 minutes each)<br/>
            We invite everyone who has something interesting or critcal to
            submit a short abstract until June 11th to the
            <a class="link" href="mailto:io-500-board@vi4io.org">steering board</a>.
            <ul>
                <li>
                    <strong>Rationalizing Public Clouds HPC Performance</strong> – <em>Vinay Gaonkar</em>
                </li>
                <li>
                    <strong>I/O performance variability in practice</strong> – <em>Glenn Lockwood</em>
                </li>
            </ul>
        </li>
        <li>
            <strong>The new IO500 list and analysis</strong> – <em>George Markomanolis, Julian Kunkel, Jay Lofstead, John Bent</em>
        </li>
        <li>
            <strong>Roadmap for IO500</strong> – <em>Julian Kunkel</em>
        </li>
        <li>
            <strong>Discussion and Voice of the community</strong> – <em>Jay Lofstead</em><br>
            We will prime a discussion with some observed issues and open the stage for feedback and issues.
        </li>
    </ul>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_full_1.jpg?w=400&tok=b4aadf">
        </div>
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_10nodes_1.jpg?w=400&tok=da4409">
        </div>
    </div>
</div>
