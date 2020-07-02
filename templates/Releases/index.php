<div class="releases index content">
    <div class="releases-lists">
        <ol>
            <?php foreach ($lists as $list) { ?>
            <li>
                <h4><?php echo strtoupper($list); ?></h4>

                <ul>                    
                    <li>
                        <?php
                        echo $this->Html->link(__('IO500'), [
                            'controller' => 'releases',
                            'action' => 'list',
                            $list
                        ]);
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Html->link(__('10 NODE'), [
                            'controller' => 'releases',
                            'action' => 'ten',
                            $list
                        ]);
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Html->link(__('FULL'), [
                            'controller' => 'releases',
                            'action' => 'full',
                            $list
                        ]);
                        ?>
                    </li>                    
                    <li>
                        <?php
                        echo $this->Html->link(__('HISTORICAL'), [
                            'controller' => 'releases',
                            'action' => 'historical',
                            $list
                        ]);
                        ?>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ol>
    </div>
</div>

<div class="landing landing-lists">
    <h1><?php echo __('IO500 Lists') ?></h1>

    <p>
        Check out the official lists from <b>IO500</b>.<br>
        It shows the best result for a given combination of system/institution/filesystem.
    </p>

    <ul>
        <li>
            <?php
            echo $this->Html->link(__('Lastest List'), [
                'controller' => 'releases',
                'action' => 'full'
            ], [
                'class' => 'button-highlight'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('About Lists'), [
                'controller' => 'pages',
                'action' => 'display',
                'about'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Used-Defined Lists'), [
                'controller' => 'records',
                'action' => 'index'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
    </ul>

    <p class="note">
        Get ready to submit for the next list!
    </p>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>
