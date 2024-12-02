<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section site-blocks-cover innerpage" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>');">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1><?php echo lang('Blog.titleOurproducts');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?></h1>
                <?php endforeach; ?>
                <p class="text-white text-center">
                    <a href="<?= base_url('user/home') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-content">
                <h1 style="color: #116530">
                    <b>
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo $tbproduk->nama_produk_en;
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo $tbproduk->nama_produk_in;
                        } ?>
                    </b>
                </h1>
                <p>
                    <?php if (lang('Blog.Languange') == 'en') {
                        echo $tbproduk->deskripsi_produk_en;
                    } elseif (lang('Blog.Languange') == 'in') {
                        echo $tbproduk->deskripsi_produk_in;
                    } ?>
                </p>
            </div>
            <div class="col-md-4 sidebar">
                <div class="project-item-title">
                    <img data-src="/asset-user/images/<?= $tbproduk->foto_produk ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                echo $tbproduk->nama_produk_en;
                                                                                            } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $tbproduk->nama_produk_in;
                                    } ?>" class="img-fluid lazyload">
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>