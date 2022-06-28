<?php $this->assign('title', 'Publications'); ?>

<?php
function cite($file) {
    return file_get_contents(WWW_ROOT . $file);
}
?>

<div class="content">
    <h2>Publications</h2>

    <ul>
        <li>
            <h3 class="doi">
                IO500 ISC22 Lists
                <a href="https://doi.org/10.5281/zenodo.6772541"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6772541.svg" alt="DOI"></a>                
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2022-05.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                User-Centric System Fault Identification Using IO500 Benchmark
                <a href="https://doi.org/10.1109/PDSW54622.2021.00011"><img src="https://zenodo.org/badge/DOI/10.1109/PDSW54622.2021.00011.svg" alt="DOI"></a>
            </h3>
        
            <div class="code">
                <p class="bib"><?php echo cite('resources/2021-PDSW-Liem.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                Benchmarking Parallel File System Sensitiveness to I/O Patterns
                <a href="https://doi.org/10.1109/MASCOTS.2019.00054"><img src="https://zenodo.org/badge/DOI/10.1109/MASCOTS.2019.00054.svg" alt="DOI"></a>
            </h3>
        
            <div class="code">
                <p class="bib"><?php echo cite('resources/2019-MASCOTS-Chasapis.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                Profiling Platform Storage using IO500 and Mistral
                <a href="https://doi.org/10.1109/PDSW49588.2019.00011"><img src="https://zenodo.org/badge/DOI/10.1109/PDSW49588.2019.00011.svg" alt="DOI"></a>
            </h3>
        
            <div class="code">
                <p class="bib"><?php echo cite('resources/2019-PDSW-Monnier.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3>Scaling High-Performance Parallel File Systems in the Cloud</h3>
        
            <div class="code">
                <p class="bib"><?php echo cite('resources/2018-PDSW-Beckett.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3>Establishing the IO-500 Benchmark</h3>
        
            <div class="code">
                <p class="bib"><?php echo cite('resources/2016-PDSW-Kunkel.bib'); ?></p>
            </div>
        </li>
    </ul>

    <h2>Datasets</h2>

    <ul>
        <li>
            <h3 class="doi">
                IO500 SC21 Lists
                <a href="https://doi.org/10.5281/zenodo.6462508"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462508.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2021-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 ISC21 Lists
                <a href="https://doi.org/10.5281/zenodo.6462505"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462505.svg" alt="DOI"></a>                
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2021-07.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 SC20 Lists
                <a href="https://doi.org/10.5281/zenodo.6462501"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462501.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2020-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 ISC20 Lists
                <a href="https://doi.org/10.5281/zenodo.6462499"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462499.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2020-07.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 SC19 Lists
                <a href="https://doi.org/10.5281/zenodo.6462493"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462493.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2019-11.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 Ranked List ISC19
                <a href="https://doi.org/10.5281/zenodo.3354660"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.3354660.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2019-06.bib'); ?></p>
            </div>
        </li>
        <li>
            <h3 class="doi">
                IO500 10 node challenge (2018)
                <a href="https://doi.org/10.5281/zenodo.6462483"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.6462483.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2018-11.bib'); ?></p>
            </div>
        </li>
    </ul>

    <h2>Software</h2>

    <ul>     
        <li>
            <h3 class="doi">
                VI4IO/io-500-dev: Zenodo Citation Release
                <a href="https://doi.org/10.5281/zenodo.2602025"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.2602025.svg" alt="DOI"></a>
            </h3>

            <div class="code">
                <p class="bib"><?php echo cite('resources/IO500-2018-09.bib'); ?></p>
            </div>
        </li>        
    </ul>    
</div>