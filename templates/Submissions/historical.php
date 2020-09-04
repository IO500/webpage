<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'submissions', 'action' => 'index']);
    $this->Breadcrumbs->add(__('HISTORICAL LIST'), ['controller' => 'submissions', 'action' => 'historical']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="submissions index content">
    <h2>Historical List</h2>

    <div class="submissions-action">
        <?php
        echo $this->Html->link(__('Customize'), [
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
                    <th colspan="7" class="tb-center">Information</th>
                    <th colspan="4" class="tb-center">IO500</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tb-center"><?php echo $this->Paginator->sort('list', __('BoF')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_institution', __('Institution')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_system', __('System')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_storage_vendor', __('Storage Vendor')) ?></th>
                    <th rowspan="2"><?php echo $this->Paginator->sort('information_filesystem_type', __('File System Type')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_nodes', __('Client Nodes')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('information_client_total_procs', __('Total Client Proc.')) ?></th>
                    <th rowspan="2" class="tb-center"><?php echo $this->Paginator->sort('status', __('Valid')) ?></th>
                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort('io500_score', __('Score')) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_bw', __('BW')) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('io500_md', __('MD')) ?></th>
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
                    <td class="tb-id">
                        <?php
                        echo $this->Html->link(strtoupper($submission->information_list_name), [
                            'controller' => 'submissions',
                            'action' => 'list',
                            $submission->information_list_name
                        ]);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(h($submission->information_institution), [
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
                    <td class="tb-center">
                        <?php
                        if ($submission->status == 'VALID') {
                            echo $this->Html->image('valid.svg', ['width' => '18px']);
                        } else {
                            echo $this->Html->image('invalid.svg', ['width' => '18px']);
                        }
                        ?>                        
                    </td>
                    <td class="tb-number"><?php echo $this->Number->format($submission->io500_score) ?></td>
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
