<?php $this->assign('title', 'Birds-of-a-Feather - ISC 26'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'26"), ['controller' => 'pages', 'action' => 'display', 'bof-isc26']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'26</h2>

    <h3>IO500: The High-Performance Storage Community</h3>

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
                <td>Wednesday, June 24, 2026 1:00 PM to 2:00 PM (Europe/Berlin)</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Congress Center Hamburg</td>
                <td>Hall F - 2nd Floor</td>
            </tr>
        </tbody>
    </table>

    <p>
        Official ISC event link: <a class="link" href="httpshttps://isc.app.swapcard.com/widget/event/isc-high-performance-2026/planning/UGxhbm5pbmdfNDQwOTI5NA==" target="_blank">IO500: The High-Performance Storage Community</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is the de facto benchmarking standard for HPC storage.
        Developed in 2017, the IO500 has published bi-annual lists since then
        for both ISC and SC. A BoF highlight is the presentation of the new
        IO500 list.
    </p>

    <p>
        The general purpose of this BoF is to foster the IO500
        community to ensure forward progress towards the
        common goals of creating, sharing, and benefiting from a
        large corpus of shared storage data. We also serve as a
        repository of detailed information about production storage
        system architectures over time as a knowledge base for other
        researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are to:
    </p>
    <ol>
        <li>
            reveal the current IO500 list and provide highlights and insight
        </li>
        <li>
            advertise the community hub but also discuss and steer the
            direction of the community effort
        </li>
        <li>
            discuss the benefit and direction of efforts within the community
        </li>
    </ol>

    <p>
        The IO500 benchmark consists of data and metadata benchmarks to
        identify performance boundaries for optimized and suboptimal
        applications. Together with comprehensive data from sites,
        supercomputers, and storage, in-depth analysis of system
        characteristics are tracked by the list and can be analyzed. In
        contrast to other lists, the IO500 collects the execution scripts
        for providing means of result verification and sharing best
        practices for data centers.
    </p>

    <p>
        Expected HPC audience are:
    </p>
    <ul>
        <li>
        I/O experts from data centers and industry
        </li>
        <li>
        researchers/engineers working on high-performance I/O for data centers
        </li>
        <li>
        domain scientists and computer scientists interested in discussing
        I/O issues.
        </li>
    </ul>

    <p>
        The outcome of this BoF will steer the direction of community efforts.
    </p>

    <!--<a class="link" href="/files/ISC26_IO500_Presentation.pdf" target="_blank">BOF Slides</a>-->
</div>
