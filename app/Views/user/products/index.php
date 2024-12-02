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
                    <a href="<?= base_url('/') ?>"> <?php echo lang('Blog.headerHome'); ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerProducts');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Products Section Start -->
<div class="site-section">
    <div class="container">
        <!-- Add margin-top to create space between header and title -->
        <div class="d-flex flex-column text-center mb-5 mt-5">
            <h1 class="mb-4 display-6 section-title text-center"><?php echo lang('Blog.btnOurproducts'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($tbproduk as $produk) : ?>
                <div class="col-md-6 mb-5 mb-lg-5 col-lg-4 d-flex align-items-stretch">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'product' : 'produk') . '/' . ($lang === 'en' ? $produk->slug_en : $produk->slug_id)) ?>" class="blog-entry rounded-corner text-decoration-none">
                        <img data-src="<?= base_url('asset-user/images/' . $produk->foto_produk) ?>" alt="<?= (lang('Blog.Languange') == 'en') ? $produk->nama_produk_en : $produk->nama_produk_in; ?>" class="img-fluid lazyload">
                        <div class="blog-entry-contents">
                            <h3 class="project-item-title mb-0 text-primary">
                                <?= (lang('Blog.Languange') == 'en') ? $produk->nama_produk_en : $produk->nama_produk_in; ?>
                            </h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Products Section End -->

<!-- Custom Styles -->
<style>
    /* Style for product items */

    .rounded-corner {
        border-radius: 20px !important;
    }

    .blog-entry {
        position: relative;
        overflow: hidden;
        background-color: silver;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        text-decoration: none;
    }

    .blog-entry:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .blog-entry img {
        transition: transform 0.3s ease-in-out;
        transform-origin: center;
    }

    .blog-entry:hover img {
        transform: scale(1);
    }

    .blog-entry-contents {
        padding: 20px;
        background-color: #E2DFDF;
        text-align: center;
        transition: background-color 0.3s ease-in-out;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .blog-entry:hover .blog-entry-contents {
        background-color: #E2FADB;
    }

    .project-item-title {
        font-size: 20px;
        /* Increase font size */
        font-weight: 600;
        color: #333;
        margin: 0;
        transition: color 0.3s ease-in-out;
    }

    .blog-entry:hover .project-item-title {
        color: #007bff;
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }
</style>

<?= $this->endSection('content'); ?>