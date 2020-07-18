<?php $this->assign('title', 'Birds-of-a-Feather - ISC 18'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'18"), ['controller' => 'pages', 'action' => 'display', 'bof-isc18']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'19</h2>

    <h3>The IO-500 and the Virtual Institute of I/O</h3>

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
                <td>11:00-12:00, June 27th, 2018</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>ISC HPC, Frankfurt, Germany</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a class="link" href="https://2018.isc-program.com/?page_id=10&id=bof101&sess=sess114" target="_blank">Link to the official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        Evolving and new storage technologies introduced over the last few years are causing increasing complexity for HPC data management. Hence, analyzing, comparing, or even predicting the performance of different HPC machines and storage systems has become more complicated. To address this challenge, the community has developed a new composite benchmark that has lead to the creation of the competitive IO-500 list. The IO-500 benchmark consists of several data and metadata benchmarks to identify performance boundaries for optimized and suboptimal applications. In addition to offering different ways to compare storage systems, the list collects detailed information about storage system design to help system designers make informed trade-offs when specifying new storage requirements. While the initial list contains only 9 systems, we expect a rapid growth in the second list.
    </p>

    <p>
        The development of the benchmark has been powered by the Virtual Institute for I/O (VI4IO), which provides a platform for I/O researchers and enthusiasts for exchanging information, fosters international collaboration in the field of HPC-I/O, and tracks the deployment of large storage systems. VI4IO provides a comprehensive data from sites, supercomputers and storage. This enables an in-depth analysis of various system characteristics.
    </p>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/events/2018/isc-bof-ceremony.jpg?w=400&tok=3740af">
        </div>
    </div>

    <h3>Agenda</h3>

    <p>
        We have a series of interactive talks and discussions.
    </p>

    <ul>
        <li>
            <strong>Introduction</strong> – <em>Jay Lofstead</em> (<a class="link" href="https://www.vi4io.org/_media/events/2018/isc-bof-jay.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>The IO-500</strong> – <em>John Bent</em> (<a class="link" href="https://www.vi4io.org/_media/io500/io500_isc18.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>Procuring small HPC storage using IO-500 benchmark</strong> – <em>George Markomanolis</em> (<a class="link" href="https://www.vi4io.org/_media/events/2018/isc-bof-procurement.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>The Virtual Institute for I/O</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://www.vi4io.org/_media/events/2018/isc-bof-vi4io.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>The new IO-500 list and analysis</strong> – <em>John Bent</em> (<a class="link" href="https://www.vi4io.org/_media/io500/io500_isc18.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>Features of the new IO-500 list</strong> – <em>Julian Kunkel</em> (Please visit: <a class="link" href="https://www.vi4io.org/io500/radar">https://www.vi4io.org/io500/radar</a> for a live demo)
        </li>
        <li>
            <strong>Moderated discussion</strong> – <em>Jay, Julian, John</em>
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
