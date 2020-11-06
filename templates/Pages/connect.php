<?php $this->assign('title', 'Connect'); ?>

<div class="landing landing-connect">
    <h1><?php echo __('Connect') ?></h1>

    <p>
    	You can use any of the following channels to stay up to date with IO500 and to discuss with the community.
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Mailing List'),
            	'http://lists.io500.org/listinfo.cgi/io500-io500.org',
            	[
                	'class' => 'button-highlight'
            	]
            );
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Slack Channel'),
            	'https://join.slack.com/t/io500workspace/shared_invite/zt-hv1i5svr-Yj8HR_wRzEy1bK2s2JX20w',
            	[
                	'class' => 'button'
            	]
        );
            ?>
        </li>
    </ul>

    <p class="note">
        Join us on social networks!
    </p>

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
