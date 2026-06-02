<?php
/**
 * Boilerplate for pages that render client-side plotly charts via webroot/js/plots.js.
 * Include after the data-plot-metric divs.
 */
$this->Html->script('https://cdn.plot.ly/plotly-2.35.2.min.js', ['block' => 'script']);
$this->Html->scriptBlock(
    'window.IO500_PLOTS_DATA_URL = ' . json_encode($this->Url->build('/plots/data.json')) . ';',
    ['block' => 'script']
);
$this->Html->script('plots.js', ['block' => 'script']);
