<div class="landing landing-graphs">
    <h1><?php echo __('Graphs') ?></h1>

    <p>
        Explore some of the <strong>IO500</strong> plots that we use in our list analysis sessions!<br>
    </p>

    <ul>
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
        You may also
            <?php
            echo $this->Html->link(__('download the CSV-file'), [
                    'controller' => 'submissions',
                    'action' => 'export',
                ],
                [
                    'class' => 'link',
                ]
            );
            ?>
        and create your own visualisations.
        If you make nice graphs, please share them with us via a pull request on GitHub.
    </p>
    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
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
