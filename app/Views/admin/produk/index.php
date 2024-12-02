<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Produk</h1>
        <hr class="mb-4">
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo base_url() . "admin/produk/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Produk</a>
        </div>
        <br>
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Produk (In)</th>
                                <th class="text-center">Nama Produk (En)</th>
                                <th class="text-center">Deskripsi Produk (In)</th>
                                <th class="text-center">Deskripsi Produk (En)</th>
                                <th class="text-center">Meta Title</th>
                                <th class="text-center">Meta Description</th>
                                <th class="text-center">Meta Title (En)</th>
                                <th class="text-center">Meta Description (En)</th>
                                <th class="text-center">Slug (In)</th>
                                <th class="text-center">Slug (En)</th>
                                <th class="text-center">Foto Produk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_data_produk as $produk) : ?>
                                <tr>
                                    <td><?= $produk->nama_produk_in ?></td>
                                    <td><?= $produk->nama_produk_en ?></td>
                                    <td><?= $produk->deskripsi_produk_in ?></td>
                                    <td><?= $produk->deskripsi_produk_en ?></td>
                                    <td><?= $produk->meta_title_produk ?></td>
                                    <td><?= $produk->meta_description_produk ?></td>
                                    <td><?= $produk->meta_title_produk_en ?></td>
                                    <td><?= $produk->meta_description_produk_en ?></td>
                                    <td><?= $produk->slug_id ?></td>
                                    <td><?= $produk->slug_en ?></td>
                                    <td><img width="50px" src="<?= base_url() . "asset-user/images/" . $produk->foto_produk; ?>"></td>
                                    <td>
                                        <a href="<?= base_url('admin/produk/edit/' . $produk->id_produk) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('admin/produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<style>
    table th, table td {
    word-wrap: break-word;
    max-width: 90px; /* Adjust as needed */
}
@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto;
    }
}
<?= $this->endSection('content') ?>