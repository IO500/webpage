<footer>
    <div class="container">
        <div class="footer">
            <?php echo date('Y'); ?> &mdash; IO500 Lists<br/>
            <br/>
            www.io5000.org
        </div>
        <div class="footer">
            <ul class="social-links">
                <li>
                    <?php
                    echo $this->Html->link(
                        file_get_contents('img/mail.svg'),
                        'http://lists.io500.org/listinfo.cgi/io500-io500.org',
                        [
                            'escape' => false,
                            'target' => '_blank'
                        ]
                    );
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link(
                        file_get_contents('img/slack.svg'),
                        'https://join.slack.com/t/io500workspace/shared_invite/zt-hv1i5svr-Yj8HR_wRzEy1bK2s2JX20w',
                        [
                            'escape' => false,
                            'target' => '_blank'
                        ]
                    );
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link(
                        file_get_contents('img/twitter.svg'),
                        'https://twitter.com/io500benchmark',
                        [
                            'escape' => false,
                            'target' => '_blank'
                        ]
                    );
                    ?>
                </li>
            </ul>
        </div>
    </div>
</footer>
