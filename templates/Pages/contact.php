<?php $this->assign('title', 'Contact'); ?>

<div class="landing landing-contact">
    <h1><?php echo __('Contact') ?></h1>

    <p>
        You can use any of the following channels to stay up to date with IO500 and to discuss with the community.
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Mailing List'),
                'http://lists.io500.org/listinfo.cgi/io500-io500.org',
                [
                    'class' => 'button-highlight',
                    'target' => '_blank'
                ]
            );
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Slack Channel'),
                'https://join.slack.com/t/io500workspace/shared_invite/zt-j3i9c00k-niCcUHisgLT2JluYhcxlQQ',
                [
                    'class' => 'button',
                    'target' => '_blank'
                ]
            );
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Twitter'),
                'https://twitter.com/io500benchmark',
                [
                    'class' => 'button',
                    'target' => '_blank'
                ]
            );
            ?>
        </li>
    </ul>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Benchmark Bug Report'),
                'https://github.com/IO500/io500/issues',
                [
                    'class' => 'button',
                    'target' => '_blank'
                ]
            );
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Webpage Bug Report'),
                'https://github.com/IO500/webpage/issues',
                [
                    'class' => 'button',
                    'target' => '_blank'
                ]
            );
            ?>
        </li>
    </ul>

    <p class="note">
        Join us on social networks!
    </p>
    
    <h2>Contact the Committee</h2>
    <p>You can reach out to the committee via <?php
            echo $this->Html->link(__('Slack'),
                'https://join.slack.com/t/io500workspace/shared_invite/zt-j3i9c00k-niCcUHisgLT2JluYhcxlQQ',
                [
                    'class' => 'link',
                    'target' => '_blank'
                ]
            );
            ?> or by using our email address: <?php
        echo $this->Html->link(__('committee@io500.org'),
            'mailto:committee@io500.org',
            [
                'class' => 'link',
                'target' => '_blank'
            ]
        );
        ?></p>

    <a href="https://www.freepik.com/vectors/social-media" class="credits">Social media vector created by stories - www.freepik.com</a>
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
