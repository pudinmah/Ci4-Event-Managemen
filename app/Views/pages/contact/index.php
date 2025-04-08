<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
<title><?= $menu ?> &#124; <?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $menu ?></h1>
        <div class="section-header-button">
            <a href="<?= site_url('contacts/new') ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <?= $this->include('layouts/alert') ?>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4><?= $submenu ?></h4>
            </div>
            <div class="card-header">
                <form action="" method="get" autocomplete="off">
                    <div class="float-left">
                        <?php $request = \Config\Services::request(); ?>
                        <input type="text" name="keyword" value="<?= $request->getGet('keyword') ?>" class="form-control" style="width:155pt;" placeholder="Keyword pencarian">
                    </div>
                    <div class="float-right ml-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>

                        <?php
                        $request = \Config\Services::request();
                        $keyword = $request->getGet('keyword');
                        if ($keyword != '') {
                            $param = "?keyword=" . $keyword;
                        } else {
                            $param = "";
                        }
                        ?>
                        <a href="<?= site_url('contacts/export' . $param) ?>" class="btn btn-primary">
                            <i class="fas fa-file-download"></i> Export Excel
                        </a>

                        <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-file-upload"></i> Import Excel
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="<?= base_url('contacts-example-import.xlsx') ?>">
                                    <i class="fas fa-file-excel"></i> Download Example
                                </a>
                                <a class="dropdown-item has-icon" href="" data-toggle="modal" data-target="#modal-import-contact">
                                    <i class="fas fa-file-import"></i> Upload File
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kontak</th>
                            <th>Alias</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Info</th>
                            <th>Grup</th>
                            <th>Action</th>
                        </tr>
                        <td>1</td>
                        <td>Nama Kontak</td>
                        <td>Alias</td>
                        <td>Telepon</td>
                        <td>Email</td>
                        <td>Alamat</td>
                        <td>Info</td>
                        <td>Grup</td>
                        <td>Action</td>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="float-left">
                    <i>Showing entries</i>
                </div>
                <!-- pagition -->
                <div class="float-right">
                    
                </div>
            </div>
        </div>

    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-import-contact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Contacts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('contacts/import') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>File Excel</label>
                    <div class="custom-file">
                        <?= csrf_field() ?>
                        <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required>
                        <label for="file_excel" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>