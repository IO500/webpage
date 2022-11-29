<?php $this->assign('title', 'Birds-of-a-Feather - SC 19'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("SC'19"), ['controller' => 'pages', 'action' => 'display', 'bof-sc19']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>SC'19</h2>

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
                <td>November 19th, 12:15-13:15</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Room 205-207, Denver Colorado</td>
            </tr>
        </tbody>
    </table>

    <p>
        Link to the <a class="link" href="https://sc19.supercomputing.org/presentation/?id=bof226&sess=sess271" target="_blank">official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        The IO500 is quickly becoming the de facto benchmarking standard for
        HPC storage. Developed two years ago, the IO500 has published four
        official lists so far. A BoF highlight is the presentation of the
        fifth IO500 list.
    </p>

    <p>
        The general purpose of this BoF is to foster the IO500 and VI4IO communities to ensure forward progress towards the common goals of creating, sharing, and benefiting from a large corpus of shared storage data. We also serve as a repository of detailed information about production storage system architectures over time as a knowledge base for other researchers and system designers to use.
    </p>

    <p>
        Goals of the BoF are 1) reveal the current IO500 list and provide highlights and insight; 2) advertise the community hub but also discuss and steer the direction of the community effort; 3) to discuss the benefit and direction of the efforts within the community.
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
            <strong>The Virtual Institute for I/O</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://hps.vi4io.org/_media/research/talks/2019/2019-11-19-the_virtual_institute_of_i_o.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>What's new with IO500</strong> – <em>George Markomanolis</em> (<a class="link" href="https://hps.vi4io.org/_media/research/talks/2019/2019-11-19-io500.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            <strong>Community lightning talks</strong> (5 minutes each)
            <ul>
                <li>
                    <strong>In-node storage and memory-like I/O</strong> – Adrian Jackson (EPCC) (<a class="link"  href="https://www.vi4io.org/_media/io500/bofs/sc19/io500-sc19-jackson-innode.pdf" target="_blank">Slides</a>)
                </li>
                <li>
                    <strong>Demonstrating GPUDirect Storage using the IO500<sup>1</sup></strong> – CJ Newburn, Co-Architect of GPUDirect Storage and Lead for HPC strategy and roadmap for NVIDIA Compute SW and Sven Oehme, Chief Research Officer, DDN (<a class="link"  href="https://www.vi4io.org/_media/io500/bofs/sc19/io500-sc19-newburn.pptx" target="_blank">Slides</a>)
                </li>
            </ul>
        </li>
        <li>
            <strong>Analysis of the IO500 data</strong> – <em>John Bent</em>
        </li>
        <li>
            <strong>Announcing Winners</strong> – <em>George Markomanolis, John Bent, Julian Kunkel, Jay Lofstead</em>
        </li>
        <li>
            <strong>Roadmap for IO500</strong> – <em>Julian Kunkel</em>
        </li>
        <li>
            <strong>Discussion and Voice of the community</strong> – <em>Jay Lofstead</em><br>
            We will prime a discussion with some observed issues and open the stage for feedback and issues.
        </li>
    </ul>

    <p>
        <sup>1</sup><em>Abstract</em>: Accelerators like GPUs are now commonly used in modern HPC systems to relieve computational performance bottlenecks. As whole workflows are migrated to GPUs, the new bottleneck is IO between storage and GPU memory; the CPU need not be part of the data path. NVIDIA is introducing GPUDirect Storage to enable GPUs to directly move data into and out of a node's GPUs to storage. To test this capability, the IO500 benchmark suite is being used. This talk will introduce the idea, share some unofficial (or official if done in time) results, the challenges with this technology, and a timeline for when this will be available as a product.
    </p>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_full_1.jpg?w=400&tok=b4aadf">
        </div>
        <div>
            <img src="https://www.vi4io.org/_media/io500/bofs/isc19/io500_isc19_10nodes_1.jpg?w=400&tok=da4409">
        </div>
    </div>
</div>
