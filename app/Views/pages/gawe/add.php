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
        <h1><?= $menu ?></h1>
    </div>

    <div class="section-body">
        <?= $this->include('layouts/alert') ?>

        <div class="card">
            <div class="card-header">
                <h4><?= $submenu ?></h4>
            </div>
            <div class="card-body col-md-8">
                <?php $errors = validation_errors(); ?>
                <form action="<?= site_url('gawe') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label>Nama Gawe / Acara *</label>
                        <input type="text" name="name_gawe" value="<?= old('name_gawe') ?>" class="form-control <?= isset($errors['name_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['name_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Judul <?= $this->extend('layouts/default') ?></label>
                        <input type="text" name="title_gawe" value="<?= old('title_gawe') ?>" class="form-control <?= isset($errors['title_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['title_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" name="place_gawe" value="<?= old('place_gawe') ?>" class="form-control <?= isset($errors['place_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['place_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address_gawe" class="form-control <?= isset($errors['address_gawe']) ? 'is-invalid' : null ?>"><?= old('address_gawe') ?></textarea>
                        <div class="invalid-feedback"><?= $errors['address_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Mulai *</label>
                        <input type="date" name="date_gawe" value="<?= old('date_gawe') ?>" class="form-control <?= isset($errors['date_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['date_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_gawe" value="<?= old('end_gawe') ?>" class="form-control <?= isset($errors['end_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['end_gawe'] ?? null ?></div>
                    </div>

                    <div class="form-group">
                        <label>Info Acara</label>
                        <textarea name="info_gawe" class="form-control"><?= old('info_gawe') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" name="image_gawe" class="form-control-file <?= isset($errors['image_gawe']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback"><?= $errors['image_gawe'] ?? null ?></div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>