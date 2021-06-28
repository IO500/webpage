<?php $this->assign('title', 'Birds-of-a-Feather - ISC 21'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("ISC'21"), ['controller' => 'pages', 'action' => 'display', 'bof-isc21']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>ISC'21</h2>

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
                <td>July 1, 2021 15:15-15:50 CEST, 6:15 AM PST, 9:15 AM EST</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Virtual, details to be announced</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a class="link" href="https://app.swapcard.com/widget/event/isc-high-performance-2021-digital/planning/UGxhbm5pbmdfNDQ0Njcz" target="_blank">Link to the official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for
        HPC storage. Developed in 2017, the IO500 has published bi-annual lists
        since then for both ISC and SC. A BoF highlight is the presentation of the eighth IO500 list.
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

    <p>Due to the time limitations of BoFs at ISC HPC (virtual), we have organized the session into two parts, the <b>interactive session presented during ISC HPC</b> and <b>supplementary presentations</b> that we release (mostly) before the BoF; please watch the supplementary presentations before the BoF and feel free to ask questions during the question session. </p>

    <h4>Interactive session during ISC HPC</h4>

    <ul>
       <li>
            <strong>Introduction to BOF</strong> – <em>Andreas Dilger</em>
        </li>

        <li>
            <strong>What's new with IO500</strong> – <em>George Markomanolis</em> 
        </li>
        <li>
            <strong>The new IO500 list and analysis:</strong> – <em>Andreas Dilger, Dean Hildebrand, Julian Kunkel, Jay Lofstead, George Markomanolis</em>
        </li>
         <ul>
              <li>Highlights</li>
              <li>Trends</li>
              <li>List of awards</li>
         </ul>
        <li>
            <strong>Roadmap for IO500</strong> – <em>Julian Kunkel</em>
        </li>
        <li>
            <strong>Question session, discussion and voice of the community</strong> – <em>Jay Lofstead</em><br>
            We will prime a discussion with some observed issues and open the stage for feedback and issues.
        </li>
    </ul>

    <h4>Supplementary presentations</h4>
    <p></p>
    <ul>
        <li><a href="https://www.youtube.com/watch?v=s7v-VJEbJW8&list=PLN0VUBsF9Di0Bsj4qia5SCqzBtTzGciA6&index=1"><strong>The Virtual Institute for I/O</strong></a> - <em>Julian Kunkel</em></li>
        <li><strong>The new IO500 list: a deep analysis</strong> - <em></em></li>
        <li>Community presentation: <a href="https://www.youtube.com/watch?v=BJpkpA6hsDc&list=PLN0VUBsF9Di0Bsj4qia5SCqzBtTzGciA6&index=2"><strong>There is nothing mysterious behind MadFS</strong> - <em>Kang Chen (Tsinghua University)</em></li>
        <li>Community presentation: <a href="https://www.youtube.com/watch?v=M1OfldbeWig&list=PLN0VUBsF9Di0Bsj4qia5SCqzBtTzGciA6&index=3"><strong>An Analysis of the IO500 for Modeling Storage Systems</strong></a> - <em>Luke Logan (Illinois Tech)</em></li>
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
