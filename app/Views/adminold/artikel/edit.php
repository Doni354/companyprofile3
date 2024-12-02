<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Artikel</h1>
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
                    <form action="<?= base_url('admin/artikel/proses_edit/' . $artikelData->id_artikel ?? '') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <?php if (isset($artikelData)) : ?>
                                    <input type="text" class="form-control" id="id_artikel" name="id_artikel" value="<?= $artikelData->id_artikel ?>" hidden>
                                    <div class="mb-3">
                                        <label class="form-label">Judul Artikel (ID)</label>
                                        <input type="text" class="form-control" id="judul_artikel_in" name="judul_artikel_in" value="<?= $artikelData->judul_artikel; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Judul Artikel (EN)</label>
                                        <input type="text" class="form-control" id="judul_artikel_en" name="judul_artikel_en" value="<?= $artikelData->judul_artikel_en; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Artikel (ID)</label>
                                        <textarea class="form-control" id="deskripsi_artikel_in" name="deskripsi_artikel_in" required><?= $artikelData->deskripsi_artikel; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Artikel (EN)</label>
                                        <textarea class="form-control" id="deskripsi_artikel_en" name="deskripsi_artikel_en" required><?= $artikelData->deskripsi_artikel_en; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Artikel</label>
                                        <input type="file" class="form-control" id="foto_artikel" name="foto_artikel">
                                        <img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $artikelData->foto_artikel; ?>">
                                        <?php if ($validation ?? false && $validation->hasError('foto_artikel')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto_artikel') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <p>*Ukuran foto maksimal 572x572 pixels</p>
                                    <p>*Foto harus berekstensi jpg/png/jpeg</p>
                                <?php endif; ?>
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