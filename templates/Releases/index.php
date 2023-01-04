<div class="submissions index content">
    <div class="submissions-lists">
        <ol>
            <?php foreach (array_reverse($releases) as $release) { ?>
            <li>
                <h4><?php echo strtoupper($release->acronym); ?></h4>

                <ul>
                    <?php foreach ($release->listings as $list) { ?>
                    <li>
                        <?php
                        echo $this->Html->link($list->type->name, [
                            'controller' => 'listings',
                            'action' => 'list',
                            strtolower($release->acronym),
                            $list->type->url
                        ]);
                        ?>
                    </li>
                    <?php } ?>
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
            echo $this->Html->link(__('Lastest List'), '/', [
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
    </ul>

    <p>
        You can <?php
            echo $this->Html->link(__('download the CSV-file'), [
                    'controller' => 'submissions',
                    'action' => 'export'
                ],
                [
                    'class' => 'link'
                ]
            );
            ?>
       of the full historic list.
    </p>
    
    <h2>User-Defined Lists</h2>
    <p>
        We also support the creation of 
        <?php if ($this->Configure->read('IO500.custom_lists')) { 
            echo $this->Html->link(__('Used-Defined Lists'), [
                'controller' => 'records',
                'action' => 'index'
            ], [
                'class' => 'link'
            ]);
        } ?>. Note that these are unofficial lists created by the community.
    </p>
    
    <p>
        Get ready to submit for the next list!
    </p>

    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>
