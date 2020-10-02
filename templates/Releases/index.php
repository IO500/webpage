<div class="submissions index content">
    <div class="submissions-lists">
        <ol>
            <?php foreach ($releases as $release) { ?>
            <li>
                <h4><?php echo strtoupper($release->acronym); ?></h4>

                <ul>                    
                    <li>
                        <?php
                        echo $this->Html->link(__('IO500'), [
                            'controller' => 'submissions',
                            'action' => 'list',
                            strtolower($release->acronym)
                        ]);
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Html->link(__('10 NODE'), [
                            'controller' => 'submissions',
                            'action' => 'ten',
                            strtolower($release->acronym)
                        ]);
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Html->link(__('FULL'), [
                            'controller' => 'submissions',
                            'action' => 'full',
                            strtolower($release->acronym)
                        ]);
                        ?>
                    </li>                    
                    <li>
                        <?php
                        echo $this->Html->link(__('HISTORICAL'), [
                            'controller' => 'submissions',
                            'action' => 'historical',
                            strtolower($release->acronym)
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
                'controller' => 'submissions',
                'action' => 'latest'
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
        <?php if ($this->Configure->read('IO500.custom_lists')) { ?>
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
        <?php } ?>
    </ul>

    <p class="note">
        Get ready to submit for the next list!
    </p>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>
