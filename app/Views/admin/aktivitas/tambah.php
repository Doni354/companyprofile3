<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Aktivitas</h1>
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
                    <form action="<?= base_url('admin/aktivitas/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Aktivitas (In) <br><span class="custom-color custom-label">nama aktivitas hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_aktivitas_in" name="nama_aktivitas_in" value="<?= old('nama_aktivitas_in') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Aktivitas (En) <br><span class="custom-color custom-label">nama aktivitas hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_aktivitas_en" name="nama_aktivitas_en" value="<?= old('nama_aktivitas_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Aktivitas (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_in" name="deskripsi_aktivitas_in"><?= old('deskripsi_aktivitas_in') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Aktivitas (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_en" name="deskripsi_aktivitas_en"><?= old('deskripsi_aktivitas_en') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Aktivitas</label>
                                    <input class="form-control <?= ($validation->hasError('foto_aktivitas')) ? 'is-invalid' : '' ?>" type="file" id="foto_aktivitas" name="foto_aktivitas">
                                    <?= $validation->getError('foto_aktivitas') ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (In)</label>
                                    <input type="text" class="form-control" name="meta_title_aktivitas" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (In)</label>
                                    <textarea class="form-control" name="meta_description_aktivitas" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (En)</label>
                                    <input type="text" class="form-control" name="meta_title_aktivitas" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (En)</label>
                                    <textarea class="form-control" name="meta_description_aktivitas" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug (In)</label>
                                    <input type="text" class="form-control" name="slug_id" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug (En)</label>
                                    <input type="text" class="form-control" name="slug_en" disabled>
                                </div>
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

<?= $this->endSection('content'); ?>