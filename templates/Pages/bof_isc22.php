<?php $this->assign('title', 'Birds-of-a-Feather - ISC 22');
 //-*- mode: c; c-basic-offset: 4; indent-tabs-mode: nil; -*-
 // * vim:expandtab:shiftwidth=4:tabstop=4:
 ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'22"), ['controller' => 'pages', 'action' => 'display', 'bof-isc22']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'22</h2>

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
                <td>Monday, May 30, 2022, 13:00 - 14:00 CET</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>In person, details on the ISC webpage</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a class="link" href="https://app.swapcard.com/widget/event/isc-high-performance-2022/planning/UGxhbm5pbmdfODYxMTg0" target="_blank">Link to the official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for
        HPC storage. The IO500 has released official lists bi-annually at
        ISC and SC events since SC17 and is constituted by over 100 submissions
        in the full list. Moreover, the IO-500 was used at SC Student cluster
        competition since SC19 and illustrates the increased need for more
        efficient storage. A BoF highlight is the presentation of the new
        IO500 list.
    </p>

    <p>
        The purpose is to foster the IO500 and VI4IO communities to ensure
        forward progress towards the common goals of creating, sharing, and
        benefiting from a large corpus of shared storage data. We also serve
        as a repository of detailed information about production storage
        system architectures over time as a knowledge base for other
        researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are 1) reveal the latest IO-500 list and provide
        highlights and insight; 2) advertise the community hub but also
        discuss and steer the direction of the community effort and latest
        developments 3) to discuss the benefit and direction of the efforts
        within the community.
    </p>

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
        Goals of the Virtual Institute for I/O are:
    </p>

    <ul>
        <li>
            Provide a platform for I/O researchers and enthusiasts for
            exchanging information
        </li>
        <li>
            Foster international collaboration in the field of
            high-performance I/O
        </li>
        <li>
            Track, and encourage, the deployment of large storage systems
            by hosting information about high-performance storage systems
        </li>
    </ul>

    <p>
        Expected HPC audience are:
    </p>
    <ul>
        <li>
        I/O experts from data centers and industry
        </li>
        <li>
        Researchers/engineers working on high-performance I/O for data centers
        </li>
        <li>
        Domain scientists and computer scientists interested in discussing
        I/O issues.
        </li>
    </ul>

    <p>
        The outcome of this BoF will steer the direction of community efforts.
    </p>

    <h3>Proposed Agenda</h3>

    <ul>
        <li>Welcome - George Markomanolis</li>
        <li>What's New with the IO500</li>
        <li>The New IO500 List Analysis</li>
        <li>IO500 Award Presentations</li>
        <li>Community Presentation(s)</li>
        <li>Roadmap</li>
        <li>Questions and Discussion</li>
    </ul>

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
