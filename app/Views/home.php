<!-- Using Layouts in Views -->
<!-- https://codeigniter.com/user_guide/outgoing/view_layouts.html#using-layouts-in-views -->
<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<title>Home &mdash; yukNikah</title>
<?= $this->endSection('content') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">
        Halo Dunia
    </div>
</section>
<?= $this->endSection() ?>