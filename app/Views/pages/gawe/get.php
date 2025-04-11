<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
<title>Data <?= $menu ?> &#124; <?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $menu ?></h1>
        <div class="section-header-button">
            <a href="<?= site_url('gawe/add') ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <div class="section-body">

        <?= $this->include('layouts/alert') ?>

        <div class="card">
            <div class="card-header">
                <h4>List <?= $submenu ?></h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gawe as $key => $row) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= esc($row->name_gawe) ?></td>
                                <td><?= esc($row->title_gawe) ?></td>
                                <td><?= esc($row->place_gawe) ?></td>
                                <td><?= date('d M Y', strtotime($row->date_gawe)) ?></td>
                                <td>
                                    <?php if ($row->image_gawe) : ?>
                                        <img src="<?= base_url('uploads/gawe/' . $row->image_gawe) ?>" width="80">
                                    <?php else : ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('gawe/edit/' . $row->id_gawe) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="<?= site_url('gawe/' . $row->id_gawe) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>