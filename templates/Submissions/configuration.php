<?php
/**
 * Configuration tab. The configuration is drawn by the DCL widget from
 * www.submission.io500.org, which reads /files/submissions/<id>.json there. That host
 * only allows https://io500.org to fetch it (CORS), so it does not render locally.
 * submission-view.css restyles the widget's output to match the other tabs.
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submission $submission
 */
$this->assign('title', h($submission->information_system) . ' - Configuration');
$this->Html->css('submission-view', ['block' => true]);
?>
<div class="subview sp sp-config">

    <?php echo $this->element('submission_header', ['active' => 'configuration']); ?>

    <div id="dcl_wrap"></div>
</div>

<?php
echo $this->Html->css([
    'https://www.submission.io500.org/css/dcl.min.css'
]);

// The page already loads jQuery (layout); a second copy from the submission site
// would replace it and drop its plugins (selectize).
echo $this->Html->script(
    [
        'https://www.submission.io500.org/js/js-yaml.min.js',
        'https://www.submission.io500.org/js/c3.min.js',
        'https://www.submission.io500.org/js/d3.min.js',
        'https://www.submission.io500.org/js/math.min.js',
        'https://unpkg.com/@popperjs/core@2',
        'https://unpkg.com/tippy.js@6',
        'https://www.submission.io500.org/js/dcl.js',
        'https://www.submission.io500.org/js/dcl-load.js',
        'https://www.submission.io500.org/js/dcl-move.js',
        'https://www.submission.io500.org/js/dcl-vis.js'
    ],
    [
        'block' => 'script'
    ]
);

$url_site = 'https://www.submission.io500.org/files/submissions/' . $submission->id . '.json?timestamp=' . time();
$url_schema = 'https://www.submission.io500.org/model/schema-io500.json?timestamp=' . time();

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
