<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Artikel</h1>
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

                    <form action="<?= base_url('admin/artikel/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (ID)</label>
                                    <input type="text" class="form-control" id="judul_artikel_in" name="judul_artikel_in" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (EN)</label>
                                    <input type="text" class="form-control" id="judul_artikel_en" name="judul_artikel_en" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel (ID)</label>
                                    <textarea class="form-control" id="deskripsi_artikel_in" name="deskripsi_artikel_in" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Artikel (EN)</label>
                                    <textarea class="form-control" id="deskripsi_artikel_en" name="deskripsi_artikel_en" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Artikel</label>
                                    <input type="file" class="form-control" id="foto_artikel" name="foto_artikel" required>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
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