<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Aktivitas</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>
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
                                    <label class="form-label">Gambar Aktivitas</label>
                                    <input type="file" class="form-control" id="foto_aktivitas" name="foto_aktivitas">
                                    <img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $aktivitasData->foto_aktivitas; ?>">
                                    <?php if ($validation ?? false && $validation->hasError('foto_aktivitas')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_aktivitas') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (In)</label>
                                    <input type="text" class="form-control" name="meta_title_aktivitas" value="<?= $aktivitasData->meta_title_aktivitas; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (In)</label>
                                    <textarea class="form-control" name="meta_description_aktivitas" required><?= $aktivitasData->meta_description_aktivitas; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (En)</label>
                                    <input type="text" class="form-control" name="meta_title_aktivitas_en" value="<?= $aktivitasData->meta_title_aktivitas_en; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (En)</label>
                                    <textarea class="form-control" name="meta_description_aktivitas_en" required><?= $aktivitasData->meta_description_aktivitas_en; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug (In)</label>
                                    <input type="text" class="form-control" name="slug_id" value="<?= $aktivitasData->slug_id; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug (En)</label>
                                    <input type="text" class="form-control" name="slug_en" value="<?= $aktivitasData->slug_en; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>