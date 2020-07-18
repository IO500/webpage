<nav>
    <div class="container navigation">
        <div class="logo">
            <?php
            echo $this->Html->link(
                $this->Html->image('logo.png'), 
                [
                    'controller' => 'releases',
                    'action' => 'latest'
                ],
                [
                    'escape' => false
                ]
            );
            ?>
        </div>

        <ul class="links">
            <li>
                <?php
                echo $this->Html->link(__('Home'), '/');
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('About'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'about'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Steering'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'steering'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Lists'), [
                    'controller' => 'releases',
                    'action' => 'index'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('BoFs'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'bofs'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Rules'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'rules'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Submission'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'submission'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('News'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'news'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Graphs'), [
                    'controller' => 'releases',
                    'action' => 'graphs'
                ]);
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(__('Running'), [
                    'controller' => 'pages',
                    'action' => 'display',
                    'running'
                ]);
                ?>
            </li>
        </ul>
    </div>
</nav>