<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'releases', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('BOF'), ['controller' => 'pages', 'action' => 'display', 'bofs']);
    $this->Breadcrumbs->add(__("SC'17"), ['controller' => 'pages', 'action' => 'display', 'bof-sc17']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>SC'17</h2>

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
                <td>5:15pm-7pm, November 15th, 2017</td>
            </tr>
            <tr>
                <td><strong>Venue</strong></td>
                <td>Room 201-203, Denver, USA</td>
            </tr>
        </tbody>
    </table>

    <p>
        Link to the <a class="link" href="http://sc17.supercomputing.org/presentation/?id=bof108&sess=sess319" target="_blank">official announcement</a>.
    </p>

    <h3>Abstract</h3>

    <p>
        Due to the increasing complexity of HPC data management, activities in the storage research community have increased over the last few years. The general purpose of this BoF is to foster this community.
    </p>

    <p>
        An important activity is the community driven development of an IO-500 benchmark. The speakers will briefly introduce the international Virtual Institute for I/O (VI4IO) and focus on the status of the IO-500 development and the usage of the benchmark. A highlight is the presentation of the first IO-500 list. The direction of VI4IO and the standardization of the IO-500 is then discussed with the participants.
    </p>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/events/2017/io500_flyer.png?w=400&tok=e0fec1">
        </div>
    </div>

    <h3>Agenda</h3>

    <p>
        We have a series of interactive talks and discussions.
    </p>

    <ul>
        <li>
            17:15 <strong>Instrocution</strong> – <em>Jay Lofstead</em> (<a class="link" href="https://www.vi4io.org/_media/events/2017/sc-bof-jay.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            17:20 <strong>IO-500</strong> – <em>John Bent</em> (<a class="link" href="https://www.vi4io.org/_media/events/2017/sc-bof-bent.pdf" target="_blank">Slides</a>)
            <ul>
                <li>Status</li>
                <li>Announcement of the first list</li>
                <li>Short discussion</li>
            </ul>
        </li>
        <li>
            17:45 <strong>VI4IO</strong> – <em>Julian Kunkel</em> (<a class="link" href="https://www.vi4io.org/_media/events/2017/sc-bof-kunkel.pdf" target="_blank">Slides</a>)
            <ul>
                <li>Introduction</li>
                <li>News to the comprehensive data center list</li>
                <li>Roadmap</li>
                <li>Short discussion</li>
            </ul>
        </li>
        <li>
            18:10 <strong>Experience using the IO-500</strong> – <em>George Markomanolis</em> (<a class="link" href="https://www.vi4io.org/_media/events/2017/sc-bof-markomanolis.pdf" target="_blank">Slides</a>)
        </li>
        <li>
            18:20 <strong>Moderated discussion</strong> – <em>Jay, Julian, John</em>
        </li>
        <li>
            19:00 Farewell
        </li>
    </ul>

    <div class="gallery">
        <div>
            <img src="https://www.vi4io.org/_media/events/2017/winner.jpg?w=400&tok=56542a">
        </div>
        <div>
            <img src="https://www.vi4io.org/_media/events/2017/list.jpg?w=400&tok=62ff19">
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