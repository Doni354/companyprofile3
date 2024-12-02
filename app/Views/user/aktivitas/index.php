<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid py-5 page-header" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-2 text-white mb-4 animated slideInDown text-shadow">
                <?php echo lang('Blog.titleActivities');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?></h3>
        <?php endforeach; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <p class="text-white text-center">
                    <a href="<?= base_url('/') ?>" class="text-white"> <?php echo lang('Blog.headerHome'); ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerActivities');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="site-section">
    <div class="container">
        <div class="d-flex flex-column text-center mb-5 mt-5">
            <h1 class="mb-4 display-6 section-title text-center"><?php echo lang('Blog.titleOurActi'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'activities' : 'aktivitas') . '/' . ($lang === 'en' ? $aktivitas->slug_en : $aktivitas->slug_id))  ?>" class="blog-entry-link">
                        <div class="blog-entry">
                            <div class="img-link">
                                <img data-src="<?= base_url('asset-user/images/' . $aktivitas->foto_aktivitas) ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                            echo $aktivitas->nama_aktivitas_en;
                                                                                                                        } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $aktivitas->nama_aktivitas_in;
                                } ?>" class="img-fluid lazyload blog-image">
                            </div>
                            <div class="blog-entry-contents">
                                <h3 class="project-item-title text-center text-primary">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $aktivitas->nama_aktivitas_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $aktivitas->nama_aktivitas_in;
                                    } ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }

    .blog-entry-link {
        display: block;
        text-decoration: none;
    }

    .blog-entry {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        background-color: #f8f9fa;
        /* Card background color */
    }

    .blog-entry:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .img-link {
        display: block;
        overflow: hidden;
        border-radius: 8px 8px 0 0;
    }

    .blog-image {
        transition: transform 0.3s ease;
    }

    .blog-entry:hover .blog-image {
        transform: scale(1);
    }

    .blog-entry-contents {
        padding: 20px;
        border-radius: 0 0 8px 8px;
        text-align: center;
        /* Center align text */
    }

    .project-item-title {
        margin: 0;
        /* Remove default margin */
    }

    .project-item-title a {
        color: #333;
        /* Text color */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .project-item-title a:hover {
        color: #007bff;
        /* Change color on hover */
    }
</style>

<?= $this->endSection('content'); ?>