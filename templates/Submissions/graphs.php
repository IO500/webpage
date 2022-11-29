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
                    'action' => 'export'
                ],
                [
                    'class' => 'link'
                ]
            );
            ?>
        and modify the         <?php
            echo $this->Html->link(__('R-Scripts'),
                'https://github.com/VI4IO/io-500-webpage/blob/main/webroot/plots/plots.org',
                [
                    'class' => 'link'
                ]
            );
            ?> that we use for plotting on the webpage.
        If you created nice graphs, please feel free to share them with us using a pull request on GitHub.
    </p>
    <a href="https://www.freepik.com/free-photos-vectors/business" class="credits">Business vector created by stories - www.freepik.com</a>
</div>

<div class="submissions index content">
    <ul class="plots">
        <li>
            <h3>IO500 Score</h3>
            <iframe src="/webroot/plots/plotly/io500-score.html"></iframe>
        </li>
        <li>
            <h3>IO500 Bandwidth</h3>
            <iframe src="/webroot/plots/plotly/io500-bandwidth.html"></iframe>
        </li>
        <li>
            <h3>IO500 Metadata</h3>
            <iframe src="/webroot/plots/plotly/io500-metadata.html"></iframe>
        </li>
    </ul>
</div>
