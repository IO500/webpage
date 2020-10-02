<?php $this->assign('title', 'Birds-of-a-Feather - ISC 20'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'20"), ['controller' => 'pages', 'action' => 'display', 'bof-isc20']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'20</h2>

    <h3>The IO-500 and the Virtual Institute of I/O</h3>

    <table class="tb">
        <thread>
            <th>
                <td></td>
                <td></td>
                <td></td>
            </th>
        </thread>
        <tbody>
            <tr>
                <td><strong>Date</strong></td>
                <td>Thursday, July 23rd</td>
            </tr>
            <tr>
                <td><strong>Time</strong></td>
                <td>16:00 BST, 08:00 US pacific, 11:00 US eastern, 23:00 CST (China)</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Virtual, details to be announced</td>
            </tr>
        </tbody>
    </table>

    <p class="link">
        <strong>Impact of COVID-19</strong>: The submission of the list will take place regardless of ISC canceling BoF sessions.
    </p>

    <p>
        This is the periodic ISC'20 list submission but earlier than the <a class="link" href="http://isc-hpc.com/" target="_blank">ISC-HPC conference</a> when we typically submission the list to prevent conflict with their digital program.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for HPC storage. Developed two years ago, the IO500 has submissiond two official lists so far. A BoF highlight is the presentation of the fourth IO-500 list.
    </p>

    <p>
        The general purpose of this BoF is to foster the IO500 and VI4IO communities to ensure forward progress towards the common goals of creating, sharing, and benefiting from a large corpus of shared storage data. We also serve as a repository of detailed information about the production storage system architectures over time as a knowledge base for other researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are to 1) reveal the current IO-500 list and provide highlights and insight; 2) advertise the community hub but also discuss and steer the direction of the community effort; 3) to discuss the benefit and direction of the efforts within the community.
    </p>

    <p>
        The IO-500 benchmark consists of data and metadata benchmarks to identify performance boundaries for optimized and suboptimal applications. Together with comprehensive data from sites, supercomputers, and storage, in-depth analysis of system characteristics are tracked by the list and can be analyzed. In contrast to other lists, the IO-500 collects the execution scripts for providing means of result verification and sharing best practices for data centers.
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
        We will have a series of interactive talks and discussions. Details will be announced soon.
    </p>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_full_1.jpg?w=400&tok=b4aadf">
        </div>
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_10nodes_1.jpg?w=400&tok=da4409">
        </div>
    </div>

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
