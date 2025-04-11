<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
<title><?= $menu ?> &#124; <?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('gawe') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Gawe</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Gawe / Acara</h4>
            </div>
            <div class="card-body col-md-6">

                <?php $errors = validation_errors(); ?>

                <form action="<?= site_url('gawe/' . $gawe->id_gawe) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Nama Gawe / Acara *</label>
                        <input type="text" name="name_gawe" value="<?= old('name_gawe', $gawe->name_gawe) ?>" class="form-control <?= isset($errors['name_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= $errors['name_gawe'] ?? null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Acara</label>
                        <input type="text" name="title_gawe" value="<?= old('title_gawe', $gawe->title_gawe) ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" name="place_gawe" value="<?= old('place_gawe', $gawe->place_gawe) ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address_gawe" class="form-control"><?= old('address_gawe', $gawe->address_gawe) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Acara *</label>
                        <input type="datetime-local" name="date_gawe" value="<?= old('date_gawe', $gawe->date_gawe) ?>" class="form-control <?= isset($errors['date_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= $errors['date_gawe'] ?? null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="datetime-local" name="end_gawe" value="<?= old('end_gawe', $gawe->end_gawe) ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Info Tambahan</label>
                        <textarea name="info_gawe" class="form-control"><?= old('info_gawe', $gawe->info_gawe) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar (Maks 100KB, 1024x768px)</label>
                        <input type="file" name="image_gawe" class="form-control-file <?= isset($errors['image_gawe']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback"><?= $errors['image_gawe'] ?? '' ?></div>

                        <?php if ($gawe->image_gawe): ?>
                            <small>Gambar saat ini:</small><br>
                            <img src="<?= base_url('uploads/gawe/' . $gawe->image_gawe) ?>" alt="Image Gawe" width="200">
                        <?php endif; ?>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>