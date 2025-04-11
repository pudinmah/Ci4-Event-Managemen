<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
<title><?= $title ?? 'Data Transaksi' ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?? 'Data Transaksi' ?></h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Tambah Pemasukan</button>
            <a href="<?= site_url('moneyout/create') ?>" class="btn btn-danger">Tambah Pengeluaran</a>
        </div>
    </div>

    <div class="section-body">
        <?= $this->include('layouts/alert') ?>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Transaksi</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($money)) : ?>
                            <?php foreach ($money as $key => $row) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= date('d M Y', strtotime($row->date_money)) ?></td>
                                    <td>Rp<?= number_format($row->nominal, 0, ',', '.') ?></td>
                                    <td>
                                        <span class="badge <?= $row->type_money === 'in' ? 'badge-success' : 'badge-danger' ?>">
                                            <?= $row->type_money === 'in' ? 'Pemasukan' : 'Pengeluaran' ?>
                                        </span>
                                    </td>
                                    <td><?= esc($row->description) ?></td>
                                    <td>
                                        <a href="<?= site_url('moneyin/show/' . $row->id_money) ?>" class="btn btn-info btn-sm">Detail</a>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row->id_money ?>">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $row->id_money ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data transaksi.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" autocomplete="off" class="needs-validation" novalidate>
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Gawe *</label>
                        <select name="id_gawe" class="form-control" required>
                            <option value="">- pilih -</option>
                            <?php foreach ($gawe as $key => $value) : ?>
                                <option value="<?= $value->id_gawe ?>"><?= $value->name_gawe ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Gawe / acara belum dipilih</div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="date_money" class="form-control" required>
                        <div class="invalid-feedback">Tanggal belum dipilih</div>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" required>
                        <div class="invalid-feedback">Nominal belum dipilih</div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="description" class="form-control" required></textarea>
                        <div class="invalid-feedback">Keterangan belum dipilih</div>
                    </div>
                    <input type="hidden" name="type_money" value="in">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php foreach ($money as $row): ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit<?= $row->id_money ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id_money ?>" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= site_url('moneyin/' . $row->id_money) ?>" method="post" autocomplete="off" class="needs-validation" novalidate>
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $row->id_money ?>">Edit Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Gawe *</label>
                            <select name="id_gawe" class="form-control" required>
                                <option value="">- pilih -</option>
                                <?php foreach ($gawe as $value) : ?>
                                    <option value="<?= $value->id_gawe ?>" <?= $value->id_gawe == $row->id_gawe ? 'selected' : '' ?>>
                                        <?= $value->name_gawe ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Gawe / acara belum dipilih</div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date_money" class="form-control" value="<?= $row->date_money ?>" required>
                            <div class="invalid-feedback">Tanggal belum dipilih</div>
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" name="nominal" class="form-control" value="<?= $row->nominal ?>" required>
                            <div class="invalid-feedback">Nominal belum dipilih</div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="description" class="form-control" required><?= $row->description ?></textarea>
                            <div class="invalid-feedback">Keterangan belum dipilih</div>
                        </div>
                        <input type="hidden" name="type_money" value="in">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Modal Hapus -->
    <div class="modal fade" id="modal-hapus<?= $row->id_money ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $row->id_money ?>" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= site_url('moneyin/' . $row->id_money) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $row->id_money ?>">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus data transaksi ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>