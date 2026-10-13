<?php
/**
 * @var \App\View\AppView $this
 * @var array<string, list<array>> $years Entries grouped by year, newest first.
 */
?>
<?php foreach ($years as $year => $items) : ?>
    <h3 class="nw-year"><?php echo h($year) ?></h3>
    <div class="nw-items">
        <?php foreach ($items as $item) : ?>
            <article class="nw-item<?php echo $item['release'] ? ' nw-release' : '' ?>">
                <time datetime="<?php echo h($item['date']) ?>"><?php echo date('j M', strtotime($item['date'])) ?></time>
                <div>
                    <?php if ($item['release']) : ?>
                        <?php $release = $item['release']; ?>
                        <p class="nw-head">
                            <?php echo $this->Html->link(
                                __('The {0} lists are published', $release['acronym']),
                                ['controller' => 'Listings', 'action' => 'list', $release['slug'], 'production'],
                            ) ?>
                            <?php if ($release['full']) : ?>
                                <span class="nw-mute">· <?php echo __('{0} submissions on the Full list', $this->Number->format($release['full'])) ?></span>
                            <?php endif; ?>
                        </p>
                        <?php if ($release['lists']) : ?>
                            <table class="nw-win">
                                <thead><tr><th><?php echo __('List') ?></th><th>#1</th><th class="n"><?php echo __('Score') ?></th></tr></thead>
                                <tbody>
                                    <?php foreach ($release['lists'] as $list) : ?>
                                        <tr>
                                            <td class="k"><?php echo $this->Html->link($list['type'], ['controller' => 'Listings', 'action' => 'list', $release['slug'], $list['url']]) ?></td>
                                            <td>
                                                <?php echo $this->Html->link($list['system'], ['controller' => 'Submissions', 'action' => 'view', $list['submission_id']], ['class' => 'nw-system']) ?>
                                                <?php echo $list['new'] ? '<span class="nw-new">' . __('new') . '</span>' : '' ?>
                                                <span class="nw-mute">· <?php echo h($list['institution']) ?></span>
                                            </td>
                                            <td class="n"><?php echo $this->Number->format($list['score'], ['places' => 2, 'precision' => 2]) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="nw-text"><?php echo $item['body'] ?></div>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
