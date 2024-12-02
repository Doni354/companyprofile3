<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5 page-header" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-2 text-white mb-4 animated slideInDown text-shadow">
                <?php echo lang('Blog.titleOurproducts');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?></h3>
        <?php endforeach; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <p class="text-white text-center">
                    <a href="<?= base_url('/') ?>"> <?php echo lang('Blog.headerHome'); ?></a></li>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>


<section class="site-section mt-5">
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
<br>
<br>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }
</style>

<?= $this->endSection('content'); ?>