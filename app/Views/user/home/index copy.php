<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>

<!-- END slider -->


<div class="site-section services-1-wrap">
    <?php foreach ($profil as $title) :  ?>
        <div class="container">
            <div class="row mb-3 justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="section-title mb-4 text-black"><?= $title->title_website; ?></h1>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- END services -->


<div class="site-section pb-0">
    <div class="block-2">
        <?php foreach ($profil as $descper) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img data-src="/asset-user/images/<?= $descper->foto_utama; ?>" <?php foreach ($profil as $perusahaan) :  ?>alt="<?= $perusahaan->nama_perusahaan; ?>"<?php endforeach; ?> class="img-fluid img-overlap lazyload">
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <h3 class="section-subtitle text-white opacity-50"><?php echo lang('Blog.titleAboutUs')  ?></h3>
                        <h2 class="section-title mb-4"><?= $descper->nama_perusahaan; ?></h2>
                        <p class="opacity-50">
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                            } ?></p>
                        <div class="button">
                            <a href="<?= base_url('user/about') ?>"><?php echo lang('Blog.btnReadmore'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- END block-2 -->


<div class="site-section block-1" style="background-color: rgb(255, 255, 255);">
    <div class="container">

        <div class="mb-3">
            <h2 class="section-title mb-2" style="color:black;"><?php echo lang('Blog.btnOurproducts'); ?></h2>
        </div>
        <div class="projects-carousel-wrap">
            <div class="owl-carousel owl-slide-3">
                <?php foreach ($tbproduk as $produk) : ?>
                    <div class="project-item">
                        <div class="project-item-contents">
                            <a href="<?= base_url('user/produk/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                <span class="project-item-category">Product</span>
                                <h2 class="project-item-title">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $produk->nama_produk_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>
                                </h2>
                            </a>
                        </div>
                        <img data-src="/asset-user/images/<?= $produk->foto_produk; ?>" 
                                alt="<?php if (lang('Blog.Languange') == 'en') {
                                        echo $produk->nama_produk_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>"
                         class="img-fluid lazyload">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="product">
            <a href="<?= base_url('user/produk') ?>"><?php echo lang('Blog.btnOurproducts'); ?></a>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>