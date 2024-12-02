<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Aktivitas</h1>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url() . "admin/aktivitas/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Aktivitas</a>
        </div>
        <br>
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Aktivitas (In)</th>
                                <th class="text-center">Nama Aktivitas (En)</th>
                                <th class="text-center">Deskripsi Aktivitas (In)</th>
                                <th class="text-center">Deskripsi Aktivitas (En)</th>
                                <th class="text-center">Meta Title</th>
                                <th class="text-center">Meta Description</th>
                                <th class="text-center">Meta Title (En)</th>
                                <th class="text-center">Meta Description (En)</th>
                                <th class="text-center">Slug (In)</th>
                                <th class="text-center">Slug (En)</th>
                                <th class="text-center">Foto Aktivitas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_data_aktivitas as $aktivitas) : ?>
                                <tr>
                                    <td><?= $aktivitas->nama_aktivitas_in ?></td>
                                    <td><?= $aktivitas->nama_aktivitas_en ?></td>
                                    <td><?= $aktivitas->deskripsi_aktivitas_in ?></td>
                                    <td><?= $aktivitas->deskripsi_aktivitas_en ?></td>
                                    <td><?= $aktivitas->meta_title_aktivitas ?></td>
                                    <td><?= $aktivitas->meta_description_aktivitas ?></td>
                                    <td><?= $aktivitas->meta_title_aktivitas_en ?></td>
                                    <td><?= $aktivitas->meta_description_aktivitas_en ?></td>
                                    <td><?= $aktivitas->slug_id ?></td>
                                    <td><?= $aktivitas->slug_en ?></td>
                                    <td><img width="50px" src="<?= base_url() . "asset-user/images/" . $aktivitas->foto_aktivitas; ?>"></td>
                                    <td>
                                        <a href="<?= base_url('admin/aktivitas/edit/' . $aktivitas->id_aktivitas) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('admin/aktivitas/delete/' . $aktivitas->id_aktivitas) ?>" class="btn btn-danger">Hapus</a>
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