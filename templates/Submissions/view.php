<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(_('LISTS'), ['controller' => 'releases', 'action' => 'index']);
    $this->Breadcrumbs->add(strtoupper($submission->information_list_name), ['controller' => 'listings', 'action' => 'list', strtolower($submission->information_list_name), 'io500']);
    $this->Breadcrumbs->add(strtoupper($submission->information_system), ['controller' => 'submissions', 'action' => 'view', $submission->id]);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="row">
    <div class="column-responsive column-80">
        <div class="submissions view content">
            <h3><?php echo h($submission->information_system) ?></h3>

            <div class="information">
                <div class="information-metadata">
                    <h4>INFORMATION</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('System') ?></th>
                            <td><?php echo h($submission->information_system) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Storage Vendor') ?></th>
                            <td><?php echo h($submission->information_storage_vendor) ?></td>
                        </tr>

                            <th><?php echo _('Filesystem Type') ?></th>
                            <td><?php echo h($submission->information_filesystem_type) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Filesystem Name') ?></th>
                            <td><?php echo h($submission->information_filesystem_name) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Filesystem Version') ?></th>
                            <td><?php echo h($submission->information_filesystem_version) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="information-data">
                    <table class="tb tb-info">                        
                        <tr>
                            <th><?php echo _('Institution') ?></th>
                            <td><?php echo h($submission->information_institution) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Client Procs Per Node') ?></th>
                            <td><?php echo h($submission->information_procs_per_node) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Client Operating System') ?></th>
                            <td><?php echo h($submission->information_client_operating_system) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Client Operating System Version') ?></th>
                            <td><?php echo h($submission->information_client_operating_system_version) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Client Kernel Version') ?></th>
                            <td><?php echo h($submission->information_client_kernel_version) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="information-metadata">
                    <h4>METADATA SERVER</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('Storage Type') ?></th>
                            <td><?php echo h($submission->information_md_storage_type) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Volatile Memory') ?></th>
                            <td><?php echo h($submission->information_md_volatile_memory_capacity) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Storage Interface') ?></th>
                            <td><?php echo h($submission->information_md_storage_interface) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Network') ?></th>
                            <td><?php echo h($submission->information_md_network) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Software Version') ?></th>
                            <td><?php echo h($submission->information_md_software_version) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('OS Version') ?></th>
                            <td><?php echo h($submission->information_md_operating_system_version) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="information-data">
                    <h4>DATA SERVER</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('Storage Type') ?></th>
                            <td><?php echo h($submission->information_ds_storage_type) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Volatile Memory') ?></th>
                            <td><?php echo h($submission->information_ds_volatile_memory_capacity) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Storage Interface') ?></th>
                            <td><?php echo h($submission->information_ds_storage_interface) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Network') ?></th>
                            <td><?php echo h($submission->information_ds_network) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Software Version') ?></th>
                            <td><?php echo h($submission->information_ds_software_version) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('OS Version') ?></th>
                            <td><?php echo h($submission->information_ds_operating_system_version) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="information-metadata">
                    <h4>IO500 SCORES</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('IO500 Score') ?></th>
                            <td><?php echo $this->Number->format($submission->io500_score, ['places' => 2, 'precision' => 2]) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('IO500 IOPS') ?></th>
                            <td><?php echo $this->Number->format($submission->io500_tot_iops, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('IO500 BW') ?></th>
                            <td><?php echo $this->Number->format($submission->io500_bw, ['places' => 2, 'precision' => 2]) ?> GiB/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('IO500 MD') ?></th>
                            <td><?php echo $this->Number->format($submission->io500_md, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                    </table>
                </div>

                <div class="information-data">
                    <h4>INFORMATION</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('Client Nodes') ?></th>
                            <td><?php echo $this->Number->format($submission->information_client_nodes) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Client Total Procs') ?></th>
                            <td><?php echo $this->Number->format($submission->information_client_total_procs) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Metadata Nodes') ?></th>
                            <td><?php echo $this->Number->format($submission->information_md_nodes) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Metadata Storage Devices') ?></th>
                            <td><?php echo $this->Number->format($submission->information_md_storage_devices) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Data Nodes') ?></th>
                            <td><?php echo $this->Number->format($submission->information_ds_nodes) ?></td>
                        </tr>
                        <tr>
                            <th><?php echo _('Data Storage Devices') ?></th>
                            <td><?php echo $this->Number->format($submission->information_ds_storage_devices) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="information-metadata">
                    <h4>IOR & FIND</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('Easy Write') ?></th>
                            <td><?php echo $this->Number->format($submission->ior_easy_write, ['places' => 2, 'precision' => 2]) ?> GiB/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Easy Read') ?></th>
                            <td><?php echo $this->Number->format($submission->ior_easy_read, ['places' => 2, 'precision' => 2]) ?> GiB/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Write') ?></th>
                            <td><?php echo $this->Number->format($submission->ior_hard_write, ['places' => 2, 'precision' => 2]) ?> GiB/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Read') ?></th>
                            <td><?php echo $this->Number->format($submission->ior_hard_read, ['places' => 2, 'precision' => 2]) ?> GiB/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Find') ?></th>
                            <td><?php echo $this->Number->format($submission->pfind_easy, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                    </table>
                </div>

                <div class="information-data">
                    <h4>METADATA</h4>

                    <table class="tb tb-info">
                        <tr>
                            <th><?php echo _('Easy Write') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_easy_write, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Easy Stat') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_easy_stat, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Easy Delete') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_easy_delete, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Write') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_hard_write, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Read') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_hard_read, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Stat') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_hard_stat, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                        <tr>
                            <th><?php echo _('Hard Delete') ?></th>
                            <td><?php echo $this->Number->format($submission->mdtest_hard_delete, ['places' => 2, 'precision' => 2]) ?> kIOP/s</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h3>Submitted Files</h3>

            <ul class="file-buttons">
                <li>
                    <?php
                    echo $this->Html->link(
                        _('Browse Files'),
                        'https://io500.org/storage/' . $submission->information_list_name . '/' . str_replace('.zip', '', $submission->storage_data),
                        [
                            'target' => '_blank',
                            'class' => 'button'
                        ]
                    );
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link(
                        _('Download ZIP'),
                        'https://io500.org/storage/' . $submission->information_list_name . '/' . $submission->storage_data,
                        [
                            'target' => '_blank',
                            'class' => 'button-highlight'
                        ]
                    );
                    ?>
                </li>
            </ul>

            <?php if (empty($submitted_files)) { ?>
            <p><?php echo _('No files were found for this submmision.'); ?></p>
            <?php }?>

            <dl>
                <?php foreach ($submitted_files as $name => $file) { ?>
                <dt class="file"><?php echo h($name); ?></dt>
                <dd>
                    <pre class=code-block><?php echo $file; ?></pre>
                </dd>
                <?php } ?>
            </dl>
        </div>
    </div>

    <div id="disqus_thread"></div>
</div>

<?php
$this->Html->scriptBlock(
"
$(document).ready(function() {
    $('dt').click(function() {
        $(this).next('dd').toggle('slow');
    });
});
", [
    'block' => true
]);
?>

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
