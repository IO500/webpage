<?php $this->assign('title', 'Birds-of-a-Feather - SC 21'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("SC'21"), ['controller' => 'pages', 'action' => 'display', 'bof-sc21']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>SC'21</h2>

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
                <td>Thursday, 18 November 2021, 12:15pm - 1:15pm CST</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Virtual, details on the SC webpage</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a class="link" href="https://sc21.supercomputing.org/presentation/?id=bof113&sess=sess360" target="_blank">Link to the official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for
        HPC storage. Developed in 2017, the IO500 has published bi-annual lists
        since then for both ISC and SC. A BoF highlight is the presentation of the new IO500 list.
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
<p><a href="/webroot/files/sc21-io500-slides.pdf">Slides</a></p>
    <ul>
  <li>Welcome - Julian Kunkel</li>
  <li>What's New with the IO500 - George Markomanolis</li>
  <li>The New IO500 List Analysis - Dean Hildebrand</li>
  <li>IO500 Award Presentations - Julian Kunkel</li>
  <li>Community Presentation - Radita Liem</li>
  <li>Roadmap - Andreas Dilger</li>
  <ul>
  <li>List Splitting Proposal - Dean Hildebrand</li>
  <li>Benchmark Components and Extended Access Patterns - Jay Lofstead</li>
  </ul>
  <li>Questions and Discussion - Jay Lofstead</li>
    </ul>
</div>
