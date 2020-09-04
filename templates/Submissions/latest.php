<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'submissions', 'action' => 'index']);
    $this->Breadcrumbs->add(__('IO500 LIST'), ['controller' => 'submissions', 'action' => 'index']);
    $this->Breadcrumbs->add(__('LATEST'), ['controller' => 'submissions', 'action' => 'list', $list]);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="submissions index content">
    <h2>IO500 <?php echo strtoupper($list); ?> List</h2>

    <div class="submissions-action">
        <?php
        echo $this->Html->link(_('Customize'), [
            'controller' => 'submissions',
            'action' => 'customize'
        ], [
            'class' => 'button'
        ]);
        ?>
    </div>

    <div class="table-responsive">
        <table class="tb">
            <thead>
                <tr>
                    <th rowspan="3" class="tb-id"><?php echo $this->Paginator->sort('io500_score', '#') ?></th>
                    <th colspan="6" class="tb-center">Information</th>
                    <th colspan="3" class="tb-center">IO500</th>
                </tr>
                <tr>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_institution', _('Institution')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_system', _('System')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_storage_vendor', _('Storage Vendor')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_filesystem_type', _('File System Type')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_nodes', _('Client Nodes')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_total_procs', _('Total Client Proc.')) ?></th>

                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('io500_score', _('Score')) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_bw', _('BW')) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_md', _('MD')) ?></th>
                </tr>
                <tr>
                    <th class="tb-center">(GiB/s)</th>
                    <th class="tb-center">(kIOP/s)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($submissions as $i => $submission) { 
                    $url = $this->Url->build([
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->id
                        ]
                    );
                ?>
                <tr onclick="window.location='<?php echo $url; ?>';">
                <tr>
                    <td class="tb-id">
                        <?php
                        echo $this->Html->link((($this->Paginator->current('Submissions') - 1) * $limit) + ($i + 1), [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->id
                        ], [
                            'class' => 'rank'
                        ]);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link($submission->information_institution, [
                            'controller' => 'submissions',
                            'action' => 'view',
                            $submission->id
                        ]);
                        ?>
                    </td>
                    <td><?php echo h($submission->information_system) ?></td>
                    <td><?php echo h($submission->information_storage_vendor) ?></td>
                    <td><?php echo h($submission->information_filesystem_type) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($submission->information_client_nodes) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($submission->information_client_total_procs) ?></td>

                    <td class="tb-number"><?php echo $this->Number->format($submission->io500_score, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($submission->io500_bw, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($submission->io500_md, ['places' => 2, 'precision' => 2]) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?php
            if ($this->Paginator->total() > 1) {
                echo $this->Paginator->first('<<');
                echo $this->Paginator->prev('<');
                echo $this->Paginator->numbers();
                echo $this->Paginator->next('>');
                echo $this->Paginator->last('>>');
            }
            ?>
        </ul>
    </div>
</div>
