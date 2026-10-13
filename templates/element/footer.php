<footer>
    <div class="container">
        <div class="footer-top">
            <div class="footer-org">
                <strong>IO500&reg; Foundation</strong>
                <a href="mailto:committee@io500.org">committee@io500.org</a>
            </div>
            <div class="footer-right">
                <ul class="footer-nav" aria-label="<?php echo __('Footer') ?>">
                    <li><?php echo $this->Html->link(__('Lists'), ['controller' => 'Releases', 'action' => 'index']) ?></li>
                    <li><?php echo $this->Html->link(__('Rules'), '/rules') ?></li>
                    <li><?php echo $this->Html->link(__('Submit'), 'https://www.submission.io500.org/', ['target' => '_blank', 'rel' => 'noopener']) ?></li>
                    <li><?php echo $this->Html->link(__('News'), '/news') ?></li>
                    <li><?php echo $this->Html->link(__('Contact'), '/contact') ?></li>
                </ul>
                <ul class="footer-social">
                    <li><a href="https://github.com/IO500/webpage/issues/new" target="_blank" rel="noopener"><i class="bi bi-github" aria-hidden="true"></i><?php echo __('Report an issue') ?></a></li>
                    <li><a href="http://lists.io500.org/listinfo.cgi/io500-io500.org" target="_blank" rel="noopener"><i class="bi bi-envelope" aria-hidden="true"></i><?php echo __('Mailing list') ?></a></li>
                    <li><a href="https://join.slack.com/t/io500workspace/shared_invite/zt-hv1i5svr-Yj8HR_wRzEy1bK2s2JX20w" target="_blank" rel="noopener"><i class="bi bi-slack" aria-hidden="true"></i><?php echo __('Join Slack') ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-legal">
            IO500&reg; is a registered trademark of the IO500 Foundation. Use allowed under limited
            <?php echo $this->Html->link(__('conditions'), '/pages/rules-messaging') ?>.
        </div>
    </div>
</footer>
