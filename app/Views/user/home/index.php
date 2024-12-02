<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>

<?php $lang = session()->get('lang') ?? 'en'; ?>

<!-- Title Section -->
<div class="container-fluid py-lg-0 feature">
    <?php foreach ($profil as $title) : ?>
        <h1 class="section-title text-center"><?= $title->title_website; ?></h1>
    <?php endforeach; ?>
</div>
<!-- Title Section End -->

<!-- About Start -->
<div class="container-xxl">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row g-5 flex-column align-items-center">
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
                    <div class="section-title text-center">
                        <p class="fs-3 fw-medium fst-italic text-primary">
                            <?php echo lang('Blog.titleAboutUs') ?>
                        </p>
                        <h1 class="display-6"><?= $descper->nama_perusahaan; ?></h1>
                    </div>
                    <div class="row g-1">
                        <p class="mb-0">
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                            } else {
                                echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                            } ?>
                        </p>
                        <a href="<?= (lang('Blog.Languange') == 'en') ? 'about' : 'tentang-kami'; ?>" class="btn-left trusted-btn">
                            <?php echo lang('Blog.btnReadmore'); ?>
                        </a>
                    </div>
                </div>
                <!-- <div class="border-top mb-3"></div> -->
                <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- About End -->

<!-- Product Section Start -->
<div class="site-section bg-custom">
    <div class="container">
        <div class="row justify-content-center py-4 mt-5">
            <div class="col-lg-6 col-md-8 col text-center mb-2">
                <p class="section-title fs-3 fw-medium fst-italic text-primary text-center">
                    <?php echo lang('Blog.btnOurproducts'); ?>
                </p>
            </div>
        </div>
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0;
                foreach ($tbproduk as $produk) :
                    if ($count % 3 == 0) { ?>
                        <div class="carousel-item <?php if ($count == 0) echo 'active'; ?>">
                            <div class="row justify-content-center">
                            <?php } ?>
                            <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
                                <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'product' : 'produk') . '/' . ($lang === 'en' ? $produk->slug_en : $produk->slug_id)) ?>" class="text-decoration-none">
                                    <div class="blog-entry border  h-100 d-flex flex-column bg-white">
                                        <img data-src="<?= base_url('asset-user/images/' . $produk->foto_produk) ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                echo $produk->nama_produk_en;
                                                                                                                            } ?>
                                            <?php if (lang('Blog.Languange') == 'in') {
                                                echo $produk->nama_produk_in;
                                            } ?>" class="img-fluid lazyload rounded-top">
                                        <div class="blog-entry-contents p-3 d-flex flex-column justify-content-center text-center">
                                            <h3 class="project-item-title mb-0 text-primary">
                                                <?php if (lang('Blog.Languange') == 'en') {
                                                    echo $produk->nama_produk_en;
                                                } ?>
                                                <?php if (lang('Blog.Languange') == 'in') {
                                                    echo $produk->nama_produk_in;
                                                } ?>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $count++;
                            if ($count % 3 == 0 || $count == count($tbproduk)) { ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <a href="<?= (lang('Blog.Languange') == 'en') ? 'product' : 'produk'; ?>" class="btn btn-lg px-4 btn-primary rounded-corner"><?php echo lang('Blog.btnOurproducts'); ?></a>
        </div>
        <br>

    </div>
</div>
<!-- Product Section End -->

<!-- Contact Section Start -->
<section class="contact-section">
    <div class="container p-5">
        <div class="d-flex flex-column text-center mb-5">
            <p class="fs-3 fw-medium fst-italic text-primary section-title text-center">
                <?php echo lang('Blog.ContactDesc') ?>
            </p>
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
    .rounded-corner {
        border-radius: 20px !important;
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

    /* Periksa dan atur container carousel */
    .carousel-inner {
        overflow: visible;
    }

    .carousel-item {
        overflow: visible;
    }

    .blog-entry {
        position: relative;
        overflow: visible;
        z-index: 1;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background-color: #ffffff;
        /* Ensure card background stays white */

    }

    .blog-entry:hover {
        z-index: 10;
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .carousel {
        overflow: visible;
    }

    .carousel-inner .row {
        justify-content: center;
        margin-top: 20px;
    }

    /* Set the background color for the entire section */
    .bg-custom {
        background-color: #CCE4C9;
        /* Replace with any color you want */
        padding: 20px 0;
    }

    .blog-entry-contents {
        background-color: #ffffff;
        /* Ensure content background stays white */
    }

    .blog-entry:hover .blog-entry-contents {
        background-color: #E2FADB;
    }
</style>

<?= $this->endSection('content') ?>