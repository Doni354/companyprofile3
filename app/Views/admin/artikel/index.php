<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Artikel</h1>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo base_url() . "admin/artikel/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Artikel</a>
        </div>
        <br>
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="text-center">Judul Artikel (In)</th>
                                <th class="text-center">Judul Artikel (En)</th>
                                <th class="text-center">Deskripsi Artikel (In)</th>
                                <th class="text-center">Deskripsi Artikel (En)</th>
                                <th class="text-center">Foto Artikel</th>
                                <th class="text-center">Meta Title (In)</th>
                                <th class="text-center">Meta Description (In)</th>
                                <th class="text-center">Meta Title (En)</th>
                                <th class="text-center">Meta Description (En)</th>
                                <th class="text-center">Slug (In)</th>
                                <th class="text-center">Slug (En)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($artikels as $artikel) : ?>
                                <tr>
                                    <td><?= $artikel->judul_artikel ?></td>
                                    <td><?= $artikel->judul_artikel_en ?></td>
                                    <td><?= $artikel->deskripsi_artikel ?></td>
                                    <td><?= $artikel->deskripsi_artikel_en ?></td>
                                    <td><img width="50px" src="<?= base_url() . "asset-user/images/" . $artikel->foto_artikel; ?>"></td>

                                    <td><?= $artikel->meta_title_artikel ?></td>
                                    <td><?= $artikel->meta_description_artikel ?></td>
                                    <td><?= $artikel->meta_title_artikel_en ?></td>
                                    <td><?= $artikel->meta_description_artikel_en ?></td>
                                    <td><?= $artikel->slug_id ?></td>
                                    <td><?= $artikel->slug_en ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/artikel/edit/' . $artikel->id_artikel) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('admin/artikel/delete/' . $artikel->id_artikel) ?>" class="btn btn-danger">Hapus</a>
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

</style>
<?= $this->endSection('content') ?>