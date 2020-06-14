<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'releases', 'action' => 'index']);
    $this->Breadcrumbs->add(__('IO500 LIST'), ['controller' => 'releases', 'action' => 'index']);
    $this->Breadcrumbs->add(__('LATEST'), ['controller' => 'releases', 'action' => 'list', $list]);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="releases index content">
    <h2>IO500 <?php echo strtoupper($list); ?> List</h2>

    <div class="releases-action">
        <?php
        echo $this->Html->link(_('Customize'), [
            'controller' => 'releases',
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
                    <th rowspan="3" class="tb-id"><?php echo $this->Paginator->sort('rank', '#') ?></th>
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
                <?php foreach ($releases as $i => $release) { ?>
                <tr>
                    <td class="tb-id">
                        <b class="rank"><?php echo (($this->Paginator->current('Releases') - 1) * $limit) + ($i + 1) ?></b>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link($release->information_institution, [
                            'controller' => 'releases',
                            'action' => 'view',
                            $release->id
                        ]);
                        ?>
                    </td>
                    <td><?php echo h($release->information_system) ?></td>
                    <td><?php echo h($release->information_storage_vendor) ?></td>
                    <td><?php echo h($release->information_filesystem_type) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($release->information_client_nodes) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($release->information_client_total_procs) ?></td>

                    <td class="tb-number"><?php echo $this->Number->format($release->io500_score, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($release->io500_bw, ['places' => 2, 'precision' => 2]) ?></td>
                    <td class="tb-number"><?php echo $this->Number->format($release->io500_md, ['places' => 2, 'precision' => 2]) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . _('first')) ?>
            <?php echo $this->Paginator->prev('< ' . _('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(_('next') . ' >') ?>
            <?php echo $this->Paginator->last(_('last') . ' >>') ?>
        </ul>
    </div>
</div>