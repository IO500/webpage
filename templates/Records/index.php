<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(_('LISTS'), ['controller' => 'records', 'action' => 'index']);
    $this->Breadcrumbs->add(_('CUSTOM LISTS'), ['controller' => 'records', 'action' => 'index']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="records index content">
    <h2>User-Defined Lists</h2>

    <div class="table-responsive">
        <table class="tb">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('name', __('List')) ?></th>
                    <th><?php echo $this->Paginator->sort('author', __('Author')) ?></th>
                    <th class="tb-center"><?php echo $this->Paginator->sort('created') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $i => $record) { ?>
                    <td>
                        <?php
                        echo $this->Html->link($record->name, [
                            'controller' => 'records',
                            'action' => 'list',
                            $record->hash
                        ]);
                        ?>
                    </td>
                    <td><?php echo h($record->author) ?></td>
                    <td class="tb-center"><?php echo h($record->created) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<<') ?>
            <?php echo $this->Paginator->prev('<') ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next('>') ?>
            <?php echo $this->Paginator->last('>>') ?>
        </ul>
    </div>

    <div id="disqus_thread"></div>
</div>