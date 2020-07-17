<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        IO500 - <?php echo $this->fetch('title') ?>
    </title>
    <?php echo $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

    <?php echo $this->Html->css('default.css') ?>

    <?php echo $this->fetch('meta') ?>
    <?php echo $this->fetch('css') ?>
</head>
<body>
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

    <main class="main">
        <div class="container">
            <?php echo $this->Flash->render() ?>
            <?php echo $this->fetch('content') ?>
        </div>
    </main>

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
                            'https://www.vi4io.org/listinfo/IO-500',
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
                            'https://join.slack.com/t/vi4io/shared_invite/zt-2z12x7o1-xhWH3WAQJRktDwy0hSus~g',
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <?php echo $this->Html->script('default') ?>
    <?php echo $this->fetch('script') ?>
</body>
</html>
