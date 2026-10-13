<?php
/**
 * Shared submission header: system name, a line with institution, storage and
 * reproducibility, the Files / Data Center links and the
 * Summary/Configuration/Reproducibility tabs.
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submission $submission
 * @var \App\Model\Entity\Questionnaire|null $questionnaire
 * @var string $active One of 'summary', 'configuration', 'reproducibility'.
 */
$squash = fn($v) => trim((string)preg_replace('/\s+/', ' ', (string)$v));
$repro = ($questionnaire && $questionnaire->reproducibility_score)
    ? $questionnaire->reproducibility_score->name : null;
$vendor = $squash($submission->information_storage_vendor);
$fsName = $squash($submission->information_filesystem_name ?: $submission->information_filesystem_type);
// Some file-system names already start with the vendor ("Huawei OceanStor Pacific").
$storage = $vendor !== '' && stripos($fsName, $vendor) === 0 ? $fsName : trim($vendor . ' ' . $fsName);
$lede = array_filter([h($squash($submission->information_institution)), h($storage)]);
if ($repro) {
    $lede[] = '<span class="sv-repro"><span class="badge badge-' . (int)$questionnaire->reproducibility_score_id
        . '" aria-hidden="true"></span>' . h($repro) . '</span>';
}
?>
<header class="sv-head">
    <div>
        <h1 class="sv-title"><?php echo h($squash($submission->information_system)) ?></h1>
        <p class="sv-lede"><?php echo implode(' · ', $lede) ?></p>
    </div>
    <div class="sv-actions">
        <?php
        if ($submission->repository_url) {
            echo $this->Html->link(__('Files'), $submission->repository_url, ['class' => 'button-navigation', 'target' => '_blank']);
        }
        if ($submission->cdcl_url) {
            echo $this->Html->link(__('Data Center'), $submission->cdcl_url, ['class' => 'button-navigation', 'target' => '_blank']);
        }
        ?>
    </div>
</header>

<nav class="sv-tabs">
    <a class="sv-tab<?php echo $active === 'summary' ? ' active' : '' ?>" href="<?php echo $this->Url->build(['controller' => 'submissions', 'action' => 'view', $submission->id]) ?>"><i class="bi bi-bar-chart-line" aria-hidden="true"></i><?php echo __('Summary') ?></a>
    <a class="sv-tab<?php echo $active === 'configuration' ? ' active' : '' ?>" href="<?php echo $this->Url->build(['controller' => 'submissions', 'action' => 'configuration', $submission->id]) ?>"><i class="bi bi-sliders" aria-hidden="true"></i><?php echo __('Configuration') ?></a>
    <?php if ($questionnaire) : ?>
        <a class="sv-tab<?php echo $active === 'reproducibility' ? ' active' : '' ?>" href="<?php echo $this->Url->build(['controller' => 'questionnaires', 'action' => 'view', $submission->id]) ?>"><i class="bi bi-patch-check" aria-hidden="true"></i><?php echo __('Reproducibility') ?></a>
    <?php endif; ?>
</nav>
