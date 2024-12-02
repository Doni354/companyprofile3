<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="container-fluid py-5 page-header" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-2 text-white mb-4 animated slideInDown text-shadow">
                <?php echo lang('Blog.titleAboutUs');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?></h3>
        <?php endforeach; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <p class="text-white text-center">
                    <a href="<?= base_url('/') ?>"> <?php echo lang('Blog.headerHome'); ?></a></li>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerAbout');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>


<!-- About Start -->
<div class="container-xxl">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row g-5 flex-column align-items-center mt-1">
                <div class="d-flex flex-column text-center mb-5 mt-5">
                    <h1 class="mb-4 display-6 section-title text-center"><?php echo lang('Blog.titleAboutUs') ?></h1>
                </div>
                <div class="col-lg-8 text-center">
                    <div class="trusted-img mb-4">
                        <img data-src="<?= base_url('asset-user/images/' . $descper->foto_utama); ?>"
                            <?php foreach ($profil as $perusahaan) : ?>
                            alt="<?= $perusahaan->nama_perusahaan; ?>"
                            <?php endforeach; ?>
                            class="img-fluid img-overlap lazyload rounded-corner">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeIn text-center" data-wow-delay="0.5s">
                    <!-- <div class="section-title text-center">
                        <p class="fs-3 fw-medium fst-italic text-primary">
                            <?php echo lang('Blog.titleAboutUs') ?>
                        </p>
                        <h1 class="display-6"><?= $descper->nama_perusahaan; ?></h1>
                    </div> -->
                    <div class="section-title text-center ">
                        <p class="fs-3 fw-medium fst-italic text-primary">
                            <?= $descper->nama_perusahaan; ?>
                        </p>
                    </div>
                    <div class="row g-1">
                        <p class="mb-0">
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo $descper->deskripsi_perusahaan_en;
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo $descper->deskripsi_perusahaan_in;
                            } ?>
                        </p>

                    </div>
                </div>
                <div class="border-top mb-3"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->

<style>
    .rounded-corner {
        border-radius: 20px !important;
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }
</style>

<?= $this->endSection('content'); ?>
