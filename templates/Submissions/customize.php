<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'submissions', 'action' => 'index']);
    $this->Breadcrumbs->add(__('CUSTOM LIST'), ['controller' => 'submissions', 'action' => 'customize']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="submissions index content">
    <h2>Your Customized List</h2>

    <div class="both"></div>

    <p>
        You can build your customized list by selecting any of the available fields.<br/>
        <?php if ($this->Configure->read('IO500.custom_lists')) { ?>
        Once you satisfied with your list, scroll down to save it and share with the community. Explore!
        <?php } ?>
    </p>

    <div class="customize">
        <?php
        echo $this->Form->create();
        echo $this->Form->select(
            'custom-fields',
            $options,
            [
                'multiple' => true,
                'id' => 'custom-fields',
                'val' => $display['custom-fields']
            ]
        );
        echo $this->Form->control(
            'custom-equation',
            [
                'label' => 'Custom Equation (used for ranking)'
            ]
        );
        echo $this->Form->select(
            'custom-order',
            [
                'DESC' => 'Higher value is better',
                'ASC' => 'Lower value is better'
            ],
            [
                'id' => 'custom-order'
            ]
        );?>

        <p>
            <?php
            echo $this->Form->checkbox(
                'custom-remove',
                [
                    'id' => 'custom-remove'
                ]
            );
            ?>
            Remove duplicate records based on tuple (<span class="code">information_system</span>, <span class="code">information_institution</span>, <span class="code">information_filesystem_type</span>).
        </p>

        <p>
            You can use any columns with numeric values for the custom equation. It has support for <span class="code">+</span>, <span class="code">-</span>, <span class="code">*</span>, <span class="code">/</span> and power (<span class="code">^</span>) operators plus <span class="code">()</span>.
        </p>

        <p>
            You can also use the following functions for columns with numeric values: <span class="code">abs</span>, <span class="code">ceil</span>, <span class="code">floor</span>, <span class="code">ln</span> (log), <span class="code">lg</span> log10, <span class="code">max</span>, <span class="code">min</span>, <span class="code">round</span>, and <span class="code">sqrt</span>.
        </p>

        <p>
            You can also use logical operators (<span class="code">==</span>, <span class="code">!=</span>, <span class="code">&lt;</span>, <span class="code">&gt;</span>, <span class="code">>=</span>, <span class="code"><=</span>, <span class="code">&&</span>, <span class="code">||</span>) to filter entries for the list. You need to multiply the result of the filter with the the custom equation. Here is an example:
        </p>

        <p>
            SC19 10-node bandwidth list: <span class="code">(io500_bw) * (information_list_name == 'SC19' && information_client_nodes == 10)</span>
        </p>

        <p>
            More examples can be found at the end of the page!
        </p>

        <?php
        echo $this->Form->submit(__('Create'));
        echo $this->Form->end();
        ?>
    </div>

    <div class="table-responsive custom-table">
        <table class="tb">
            <thead>
                <tr>
                    <th rowspan="2" class="tb-id">#</th>

                    <?php if ($equation && $valid) { ?>
                    <th rowspan="2" class="tb-id">Custom Equation</th>
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
                <tr onclick="window.location='<?php echo $url; ?>';">
                <tr>
                    <td class="tb-id">
                        <?php
                        echo $this->Html->link(($i + 1), [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->submission->id
                        ], [
                            'class' => 'rank'
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

    <?php
    if ($this->Configure->read('IO500.custom_lists')) {
        if ($selected_fields) {
    ?>

            <p>
                You can save this list and share it with your collegues! You will be provided with a permanent URL.
            </p>

            <div class="customize">
                <?php
                echo $this->Form->create(null, [
                    'url' => [
                        'controller' => 'records',
                        'action' => 'save'
                    ]
                ]);
                echo $this->Form->control('name');
                echo $this->Form->control('author');
                echo $this->Form->control('fields', [
                    'value' => $selected_fields,
                    'readonly'
                ]);

                echo $this->Form->submit(__('Save'));
                echo $this->Form->end();
                ?>
            </div>

    <?php
        }
    }
    ?>

    <p>
        Additional examples on how to create custom lists:
    </p>

    <p>
        Bandwidth per server list: <span class="code">(information_ds_nodes + information_md_nodes != 0) * (io500_bw / (information_ds_nodes + ((information_ds_nodes == 0) * information_md_nodes) + 0.0001))</span>
    </p>

    <p>
        Metadata per server list: <span class="code">(information_ds_nodes + information_md_nodes != 0) * (io500_md / (information_md_nodes + ((information_md_nodes == 0) * information_ds_nodes) + 0.0001))</span>
    </p>
</div>
