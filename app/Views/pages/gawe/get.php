<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $judul ?></h1>
    </div>

    <div class="section-body">
        <?= $subjudul ?>
    </div>
</section>
<?= $this->endSection() ?>