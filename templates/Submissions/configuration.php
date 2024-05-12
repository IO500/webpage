<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(_('LISTS'), ['controller' => 'releases', 'action' => 'index']);
    $this->Breadcrumbs->add(strtoupper($submission->information_list_name), ['controller' => 'listings', 'action' => 'list', strtolower($submission->information_list_name), 'io500']);
    $this->Breadcrumbs->add(strtoupper($submission->information_system), ['controller' => 'submissions', 'action' => 'view', $submission->id]);
    $this->Breadcrumbs->add(_('CONFIGURATION'), ['controller' => 'submissions', 'action' => 'configuration', $submission->id]);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="row">
    <div class="column-responsive column-80">
        <div class="submissions view content">
            <h2 class="submissions-name">
                <?php if ($questionnaire) { ?>
                <div class="badge badge-<?php echo $questionnaire->reproducibility_score_id; ?>"></div>
                <?php } ?>

                <?php echo h($submission->information_system); ?>
            </h2>

            <div class="submissions-action">
                <?php
                echo $this->Html->link(
                    _('Summary'),
                    [
                        'controller' => 'submissions',
                        'action' => 'view',
                        $submission->id
                    ],
                    [
                        'class' => 'button-navigation'
                    ]
                );
            
                echo $this->Html->link(
                    _('Configuration'),
                    [
                        'controller' => 'submissions',
                        'action' => 'configuration',
                        $submission->id
                    ],
                    [
                        'class' => 'button'
                    ]
                );

                if ($questionnaire) {
                    echo $this->Html->link(
                        _('Reproducibility'),
                        [
                            'controller' => 'questionnaires',
                            'action' => 'view',
                            $submission->id
                        ],
                        [
                            'class' => 'button-navigation'
                        ]
                    );
                }

                if ($submission->repository_url) {
                    echo $this->Html->link(
                        _('Files'),
                        $submission->repository_url,
                        [
                            'target' => '_blank',
                            'class' => 'button-navigation'
                        ]
                    );
                }

                if ($submission->cdcl_url) {
                    echo $this->Html->link(
                        _('Data Center'),
                        $submission->cdcl_url,
                        [
                            'class' => 'button-navigation',
                            'target' => '_blank'
                        ]
                    );
                }
                ?>
            </div>

            <div class="both"></div>

            <div class="submissions index content">
                <div id="dcl_wrap"></div>
            </div>
        </div>
    </div>
</div>


<?php
echo $this->Html->css([
    'http://localhost/submission-system/css/dcl.min.css'
]);

echo $this->Html->script(
    [
        'http://localhost/submission-system/js/js-yaml.min.js',
        'http://localhost/submission-system/js/c3.min.js',
        'http://localhost/submission-system/js/d3.min.js',
        'http://localhost/submission-system/js/jquery.min.js',
        'http://localhost/submission-system/js/math.min.js',
        'https://unpkg.com/@popperjs/core@2',
        'https://unpkg.com/tippy.js@6',
        'http://localhost/submission-system/js/dcl.js',
        'http://localhost/submission-system/js/dcl-load.js',
        'http://localhost/submission-system/js/dcl-move.js',
        'http://localhost/submission-system/js/dcl-vis.js'
    ],
    [
        'block' => 'script'
    ]
);

$url_site = 'http://localhost/submission-system/files/submissions/' . $submission->id . '.json?timestamp=' . time();
$url_schema = 'http://localhost/submission-system/model/schema-io500.json?timestamp=' . time();

$this->Html->scriptBlock(
    "
    $(document).ready(function() {
        dcl_draw_graph = false;
        dcl_draw_table = false;
        dcl_draw_toolbar = false;
        dcl_draw_aggregation = false;
        dcl_global_readonly = true;

        dcl_schema = '" . $url_schema . "';
        dcl_site =  '" . $url_site . "';

        dcl_startup();
    });
    ",
    [
        'block' => 'script'
    ]
);
?>
