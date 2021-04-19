<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'submissions', 'action' => 'index']);
    $this->Breadcrumbs->add(__('CUSTOM LIST'), ['controller' => 'submissions', 'action' => 'customize']);
    $this->Breadcrumbs->add(h(strtoupper($record->name)), ['controller' => 'records', 'action' => 'list', $record->hash]);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="submissions index content">
    <h2><?php echo h($record->name); ?></h2>

    <div class="both"></div>

    <div class="unofficial">
        <strong>NOTICE</strong>: This is an <strong>unofficial</strong> IO500 list created by <?php echo h($record->author); ?>.
    </div>

    <p>
        <strong>Custom Ranking:</strong> 
        <?php if ($equation) { ?>
            <span class="code"><?php echo $display['custom-equation']; ?></span>
        <?php } else {?>
            <span class="code">io500_score</span>
        <?php } ?>
    </p>

    <div class="table-responsive custom-table">
        <table class="tb">
            <thead>
                <tr>
                    <th rowspan="2" class="tb-id">#</th>

                    <?php if ($equation && $valid) { ?>
                    <th rowspan="2" class="tb-id">Ranking<br/>(<?php echo $display['custom-order']; ?>)</th>
                    <?php } ?>

                    <?php
                    $total_information = 0;
                    $total_io500 = 0;
                    $total_mdtest = 0;
                    $total_ior = 0;
                    $total_find = 0;

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'information_') === 0) {
                            $total_information += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'io500_') === 0) {
                            $total_io500 += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'mdtest_') === 0) {
                            $total_mdtest += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'ior_') === 0) {
                            $total_ior += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'find_') === 0) {
                            $total_find += 1;
                        }
                    }
                    ?>

                    <?php if ($total_information) { ?>
                    <th colspan="<?php echo $total_information; ?>" class="tb-center">Information</th>
                    <?php } ?>

                    <?php if ($total_io500) { ?>
                    <th colspan="<?php echo $total_io500; ?>" class="tb-center">IO500</th>
                    <?php } ?>

                    <?php if ($total_mdtest) { ?>
                    <th colspan="<?php echo $total_mdtest; ?>" class="tb-center">MDTEST</th>
                    <?php } ?>

                    <?php if ($total_ior) { ?>
                    <th colspan="<?php echo $total_ior; ?>" class="tb-center">IOR</th>
                    <?php } ?>

                    <?php if ($total_find) { ?>
                    <th colspan="<?php echo $total_find; ?>" class="tb-center">FIND</th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php
                    if ($total_information) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'information_') === 0) {
                    ?>

                    <th rowspan="2"><?php echo str_replace('_', ' ', str_replace('information_', '', $field)); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_io500) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'io500_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo str_replace('_', ' ', str_replace('io500_', '', $field)); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_mdtest) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'mdtest_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo str_replace('_', ' ', str_replace('mdtest_', '', $field)); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_ior) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'ior_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo str_replace('_', ' ', str_replace('ior_', '', $field)); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_find) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'find_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo str_replace('_', ' ', str_replace('find_', '', $field)); ?></th>

                    <?php
                            }
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($submissions as $i => $submission) {
                    $url = $this->Url->build([
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->submission->id
                        ]
                    );

                    // We will use the latest valid score to display
                    $submission->submission->io500_score = $submission->score;
                ?>
                <tr>
                    <td class="tb-id">
                        <?php
                        echo $this->Html->link(($i + 1), [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->submission->id
                        ], [
                            'class' => 'custom-rank'
                        ]);
                        ?>
                    </td>

                    <?php
                    if ($equation && $valid) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($submission->submission->equation, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                    }

                    if ($total_information) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'information_') === 0) {
                    ?>
                    <td><?php echo h($submission->submission->{$field}) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_io500) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'io500_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($submission->submission->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_mdtest) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'mdtest_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($submission->submission->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_ior) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'ior_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($submission->submission->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_find) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'find_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($submission->submission->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="unofficial unofficial-bottom">
        <strong>NOTICE</strong>: This is an <strong>unofficial</strong> IO500 list created by <?php echo h($record->author); ?>.
    </div>

    <div id="disqus_thread"></div>
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
