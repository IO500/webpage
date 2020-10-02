<?php $this->assign('title', 'Birds-of-a-Feather - SC 16'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("SC'16"), ['controller' => 'pages', 'action' => 'display', 'bof-sc16']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>SC'16</h2>

    <h3>BoF: The Virtual Institute for I/O and the IO-500</h3>

    <p>
        Due to the increasing complexity of HPC data management, activities in the storage research community have increased over the last few years. The general purpose of this BoF is to foster this community and discuss the role of the international Virtual Institute for I/O (VI4IO, <a class="link" href="http://vi4io.org">http://vi4io.org</a>) in supporting, developing, and maintaining this community.
    </p>

    <p>
        The speakers will give talks covering VI4IO and issues of benchmarking storage systems. The direction of these efforts is then discussed with the participants. A specific purpose of the BoF is to elaborate whether the community would be well-served by an IO-500 benchmark similar to the Top-500.
    </p>

    <p>
        Goals of the BoF are to 1) advertise the community hub but also discuss and steer the direction of the community effort, 2) to specifically identify possibilities to create a relevant community I/O benchmark that can be tracked with an IO-500 list.
    </p>

    <p>
        Expected HPC audience are 1) I/O experts from data centers and industry, 2) researchers/engineers working on high-performance I/O for data centers, 3) domain scientists and computer scientists interested in discussing I/O issues.
    </p>

    <p>
        The BoF is held in conjunction with the <a class="link" href="http://sc16.supercomputing.org/" target="_blank">Supercomputing conference</a>. The schedule is listed <a class="link" href="http://sc16.supercomputing.org/?post_type=page&p=3273&id=bof123&sess=sess336" target="_blank">here</a>.
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
                <td>Thursday Nov. 17th, 2016</td>
            </tr>
            <tr>
                <td><strong>Time</strong></td>
                <td>12:15-13:15</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Room 250-D, Salt Lake City, USA</td>
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
        <li>John Bent (Seagate Government Solutions), <a class="link" href="mailto:john.bent@seagategov.com">john.bent@seagategov.com</a></li>
    </ul>

    <h3>Agenda</h3>

    <p>
        <a href="https://www.vi4io.org/_media/io500/bofs/sc16/sc16-bof-vi4io.pdf">Our BoF summary:</a>
    </p>

    <ul>
        <li>
            20 min, <strong>Introduction to VI4IO and the HPSL</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://www.vi4io.org/_media/io500/bofs/sc16/bof-sc16-vi4io.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            20 min, <strong>The IO-500 benchmarking effort</strong> – <em>John Bent</em> (<a class="link" href="https://www.vi4io.org/_media/io500/bofs/sc16/bof-sc16-io500.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            20 min, <strong>Discussion</strong> – <em>Jay Lofstead</em>
        </li>
    </ul>

    <h3>Speakers</h3>

    <ul>
        <li>
            <strong>Julian Kunkel</strong>. Dr. Kunkel is responsible for several projects in the research division at DKRZ. Julian gained interest in the topic of HPC storage during his studies of computer science in 2003. Since then, he researches methods to improve efficiency of storage systems in general. Besides his main goal to provide efficient and performance-portable I/O, his HPC-related interests are: data reduction techniques, performance analysis of parallel applications and parallel I/O, management of cluster systems, cost-efficiency considerations, and software engineering of scientific software.
        </li>
        <li>
            <strong>Jay Lofstead</strong>. Dr. Jay Lofstead is a Principal Member of Technical Staff at Sandia National Laboratories in Albuquerque, New Mexico. Since 2010, Jay has been working on HPC simulation workflows focusing on data management issues and as well as general I/O and storage issues for HPC. His prior work includes the R&D100 Award winning ADIOS I/O componentization framework in use in more than 30 production scientific simulations. He is a member of several conference and workshop program committees.
        </li>
        <li>
            <strong>John Bent</strong>. As Chief Architect for Seagate Government Solutions, John Bent researches and designs storage systems necessary to support an exascale supercomputer. His prior work includes building several burst buffer prototypes while working for EMC and the PLFS virtual file system that achieved orders of magnitude bandwidth improvements for parallel writes to a single file while working for Los Alamos National Lab.
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
