<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Dashboard</h1>
        <!-- <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Welcome, Admin!</h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">
                            <div>
                                Ini adalah halaman Admin untuk mengatur halaman Frontend Company Profile.
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div> -->
        <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Jumlah Slider</h4>
                        <div class="stats-figure"><?= $sliderCount; ?></div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="<?= base_url('/admin/slider/index') ?>"></a>
                </div><!--//app-card-->
            </div><!--//col-->

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Jumlah Produk</h4>
                        <div class="stats-figure">
                            <div class="stats-figure"><?= $productCount; ?></div>
                        </div>
                        <div class="stats-meta text-success">
                        </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="<?= base_url('/admin/produk/index') ?>"></a>
                </div><!--//app-card-->
            </div><!--//col-->

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Jumlah Aktivitas</h4>
                        <div class="stats-figure"><?= $aktivitasCount; ?></div>
                        <div class="stats-meta text-success">
                        </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="<?= base_url('/admin/aktivitas/index') ?>"></a>
                </div><!--//app-card-->
            </div><!--//col-->

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Jumlah Artikel</h4>
                        <div class="stats-figure"><?= $artikelCount; ?></div>
                        <div class="stats-meta text-success">
                        </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="<?= base_url('/admin/artikel/index') ?>"></a>
                </div><!--//app-card-->
            </div><!--//col-->

            <!-- Tambahkan kolom lain di sini jika diperlukan -->
            <!--<div class="col-6 col-lg-3">-->
            <!--    <div class="app-card app-card-stat shadow-sm h-100">-->
            <!--        <div class="app-card-body p-3 p-lg-4">-->
            <!--            <h4 class="stats-type mb-1">Invoices</h4>-->
            <!--            <div class="stats-figure">6</div>-->
            <!--            <div class="stats-meta">New</div>-->
            <!--        </div>-->
            <!--        <a class="app-card-link-mask" href="#"></a>-->
            <!--    </div>-->
            <!--</div>-->
            <!--//col-->
        </div><!--//row-->

    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>