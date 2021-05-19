<?php $this->assign('title', 'Birds-of-a-Feather'); ?>

<div class="landing landing-bofs">
    <h1><?php echo __('BoFs') ?></h1>

    <p>
        The <strong>IO500</strong> has held several Birds-of-a-Feather sessions.<br>
        You can find more information about them in:.
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link("ISC'21", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-isc21'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("ISC'20", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-isc20'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("ISC'19", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-isc19'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("ISC'18", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-isc18'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("ISC'16", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-isc16'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
    </ul>

    <ul>
        <li>
            <?php
            echo $this->Html->link("SC'20", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-sc20'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("SC'19", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-sc19'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("SC'18", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-sc18'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("SC'17", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-sc17'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link("SC'16", [
                'controller' => 'pages',
                'action' => 'display',
                'bof-sc16'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
    </ul>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>

<div class="submissions index content">
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
