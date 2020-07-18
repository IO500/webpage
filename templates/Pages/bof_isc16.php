<?php $this->assign('title', 'Birds-of-a-Feather - ISC 16'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'16"), ['controller' => 'pages', 'action' => 'display', 'bof-isc16']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'16</h2>

    <h3>BoF: VI4IO: The I/O Community Hosting the High-Performance Storage List</h3>

    <p>
        Due to the increasing complexity of data management, the activities in the storage research community increased over the last decade. In this BoF, the Virtual Institute for I/O (VI4IO), an international effort for the high-performance storage community, is introduced and discussed with the participants. The community web page <a class="link" href="http://vi4io.org" target="_blank">http://vi4io.org/</a> will be launched at ISC-HPC. The goals of the community are: to provide a platform for I/O researchers and enthusiasts for exchanging information, to foster international collaboration in the field of high-performance I/O, to track the deployment of large storage systems by hosting of an open high-performance storage list. In particular, it offers research groups (and vendors) the chance to describe their knowledge. Furthermore, relevant I/O tools for, e.g., monitoring and benchmarking are provided. All this information is characterized in meaningful categories and are visualized in tag clouds to simplify search. The High-Performance Storage List is introduced, similar to TOP500, this list maintains relevant storage systems and tracks their performance. Since I/O benchmarking is composed of many facets and very time consuming, tracked metrics are not handled as strict as for related lists. However, sites submitting a result are required to describe the measurement conditions. This open community is guided by philosophical cornerstones and independent of vendors and research facilities. In the BoF, we give an introductory presentation and then focus on discussing the community hub and philosophy, the metrics of the HPSL list and the current list. We hope that this effort will contribute to accelerate I/O research and foster collaborations.
    </p>

    <p>
        The BoF is held in conjunction with the <a class="link" href="http://www.isc-hpc.com/" target="_blank">ISC High Performance conference</a>. The schedule is listed <a class="link" href="http://www.isc-hpc.com/isc16_ap/sessiondetails.htm?t=session&o=363&a=select&ra=search" target="_blank">here</a>.
    </p>

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
                <td>Wednesday June. 22nd, 2016</td>
            </tr>
            <tr>
                <td><strong>Time</strong></td>
                <td>12:30-13:45</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Frankfurt, Germany</td>
            </tr>
        </tbody>
    </table>

    <h3>Organization</h3>

    <p>
        The BoF is organized by:
    </p>

    <ul>
        <li>Julian Kunkel (DKRZ, Germany), <a class="link" href="mailto:kunkel@dkrz.de">kunkel@dkrz.de</a></li>
        <li>Jay Lofstead (Sandia National Lab), <a class="link" href="mailto:gflofst@sandia.gov">gflofst@sandia.gov</a></li>
        <li>Colin McMurtrie (CSCS, Switzerland), <a class="link" href="mailto:cmurtrie@cscs.ch">cmurtrie@cscs.ch</a></li>
    </ul>

    <h3>Agenda</h3>

    <ul>
        <li>
            Overview of the Virtual Institute for I/O
            <ul>
                <li>Goals and philosophy</li>
                <li>Content of the community hub</li>
            </ul>
        </li>
        <li>
            Discussion
        </li>
        <li>
            The High-Performance Storage List
            <ul>
                <li>Metrics</li>
                <li>The current list</li>
            </ul>
        </li>
        <li>
            Discussion of the community approach and inquired metrics
        </li>
        <li>
            Approach to participate (internal portal to structure pages)
        </li>
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
