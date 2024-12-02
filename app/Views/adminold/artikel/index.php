<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Artikel</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/artikel/tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Artikel</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">Judul Artikel (ID)</th>
                                        <th class="text-center" valign="middle">Judul Artikel (EN)</th>
                                        <th class="text-center" valign="middle">Deskripsi Artikel (ID)</th>
                                        <th class="text-center" valign="middle">Deskripsi Artikel (EN)</th>
                                        <th class="text-center" valign="middle">Foto Artikel</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($artikels as $artikel) : ?>
                                        <tr>
                                            <td><?= $artikel->judul_artikel ?></td>
                                            <td><?= $artikel->judul_artikel_en ?></td>
                                            <td><?= $artikel->deskripsi_artikel ?></td>
                                            <td><?= $artikel->deskripsi_artikel_en ?></td>
                                            <td><img src="<?= base_url('asset-user/images/' . $artikel->foto_artikel) ?>" class="img-fluid" alt="Foto artikel" width="100"></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/artikel/edit/' . $artikel->id_artikel) ?>" class="btn btn-primary">Ubah</a>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $artikel->id_artikel ?>">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//tab-content-->
    </div><!--//container-xl-->
</div><!--//app-content-->

<!-- Modal Konfirmasi Hapus -->
<?php foreach ($artikels as $artikel) : ?>
    <div class="modal fade" id="deleteModal<?= $artikel->id_artikel ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus artikel ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/artikel/delete/' . $artikel->id_artikel) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection('content') ?>