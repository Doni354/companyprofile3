<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5 page-header" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-2 text-white mb-4 animated slideInDown">
                <?php echo lang('Blog.titleOurarticle');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?></h3>
        <?php endforeach; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <p class="text-white text-center">
                    <a href="<?= base_url('/') ?>"> <?php echo lang('Blog.headerHome'); ?></a></li>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerContact');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Section Start -->
<section class="contact-section">
    <div class="container p-5">
        <div class="d-flex flex-column text-center mb-5">
            <h1 class="mb-4 display-6 section-title text-center"><?php echo lang('Blog.ContactDesc'); ?></h1>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="map">
                    <?php foreach ($profil as $maps) : ?>
                        <?= $maps->link_maps ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card shadow-sm p-3">
                    <div class="card-body text-center">
                        <?php foreach ($profil as $desc) : ?>
                            <blockquote class="blockquote text-primary">
                                <p class="mb-0" style="font-size: 1.2rem;">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $desc->deskripsi_kontak_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $desc->deskripsi_kontak_in;
                                    } ?>
                                </p>
                            </blockquote>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Custom Styles -->
<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }

    .map {
        width: 100%;
        height: 400px;
        border-radius: 15px;
        overflow: hidden;
    }

    .card {
        border-radius: 15px;
        max-width: 500px;
        margin: auto;
    }

    .card-body {
        padding: 1.5rem;
    }

    .blockquote {
        font-size: 1.2rem;
        text-align: center;
    }
</style>

<?= $this->endSection('content'); ?>