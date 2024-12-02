<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Aktivitas</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/aktivitas/proses_edit/' . $aktivitasData->id_aktivitas) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="id_aktivitas" name="id_aktivitas" value="<?= $aktivitasData->id_aktivitas ?>" hidden>
                                <div class="mb-3">
                                    <label class="form-label">Nama aktivitas (In)</label>
                                    <input type="text" class="form-control" id="nama_aktivitas_in" name="nama_aktivitas_in" value="<?= $aktivitasData->nama_aktivitas_in; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama aktivitas (En)</label>
                                    <input type="text" class="form-control" id="nama_aktivitas_en" name="nama_aktivitas_en" value="<?= $aktivitasData->nama_aktivitas_en; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi aktivitas (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_in" name="deskripsi_aktivitas_in"><?= $aktivitasData->deskripsi_aktivitas_in; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi aktivitas (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_en" name="deskripsi_aktivitas_en"><?= $aktivitasData->deskripsi_aktivitas_en; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto aktivitas</label>
                                    <input type="file" class="form-control" id="foto_aktivitas" name="foto_aktivitas">
                                    <img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $aktivitasData->foto_aktivitas; ?>">
                                    <?= $validation->getError('foto_aktivitas') ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>