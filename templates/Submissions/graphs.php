<div class="landing landing-graphs">
    <h1><?php echo __('Graphs') ?></h1>

    <p>
        Explore some of the <strong>IO500</strong> plots that we use in our list analysis sessions!<br>
    </p>

    <ul class="button-group">
        <li>
            <?php
            echo $this->Html->link(__('IOR Graphs'), [
                'controller' => 'submissions',
                'action' => 'ior'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('MDtest Graphs'), [
                'controller' => 'submissions',
                'action' => 'mdtest'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->link(__('Find Graphs'), [
                'controller' => 'submissions',
                'action' => 'pfind'
            ], [
                'class' => 'button'
            ]);
            ?>
        </li>
    </ul>
    
    <p>
        For raw data, browse our
            <?php
            echo $this->Html->link(__('release pages'), [
                    'controller' => 'releases',
                    'action' => 'index',
                ],
                [
                    'class' => 'link',
                ]
            );
            ?>
        to download per-release CSVs and create your own visualisations.
    </p>
</div>

<div class="submissions index content">
    <ul class="plots">
        <li>
            <h3>IO500 Score</h3>
            <div data-plot-metric="score"></div>
        </li>
        <li>
            <h3>IO500 Bandwidth</h3>
            <div data-plot-metric="io500_bw"></div>
        </li>
        <li>
            <h3>IO500 Metadata</h3>
            <div data-plot-metric="io500_md"></div>
        </li>
    </ul>
</div>

<?= $this->element('plots-scripts') ?>
