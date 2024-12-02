<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Aktivitas</h1>
            </div>
            </br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?php echo base_url() . "admin/aktivitas/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Ativitas </a>
            </div>
        </div><!--//row-->

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
                            <!-- <a href="/member/create">Add Member</a> -->
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">Nama Aktivitas (In)</th>
                                        <th class="text-center" valign="middle">Nama Aktivitas (En)</th>
                                        <th class="text-center" valign="middle">Deskripsi Aktivitas (In)</th>
                                        <th class="text-center" valign="middle">Deskripsi Aktivitas (En)</th>
                                        <th class="text-center" valign="middle">Foto Aktivitas</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($all_data_aktivitas as $tampilAktivitas) : ?>
                                        <tr>
                                            <td><?= $tampilAktivitas->nama_aktivitas_in ?></td>
                                            <td><?= $tampilAktivitas->nama_aktivitas_en ?></td>
                                            <td><?= $tampilAktivitas->deskripsi_aktivitas_in ?></td>
                                            <td><?= $tampilAktivitas->deskripsi_aktivitas_en ?></td>
                                            <td><img src="<?= base_url() . 'asset-user/images/' . $tampilAktivitas->foto_aktivitas ?>" class="img-fluid" alt="Foto Aktivitas"></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/aktivitas/delete') . '/' . $tampilAktivitas->id_aktivitas ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('admin/aktivitas/edit') . '/' . $tampilAktivitas->id_aktivitas ?>" class="btn btn-primary">Ubah</a>
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

        </div><!--//container-fluid-->
    </div><!--//app-content-->

</div><!--//app-wrapper-->

<?= $this->endSection('content') ?>