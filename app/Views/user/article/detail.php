<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);
    }

    .article-title {
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 100%;
    }

    .article-item {
        display: flex;
        height: 110px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 8px;
        background-color: #343a40;
    }

    .article-item:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .article-image {
        width: 110px;
        height: 110px;
        object-fit: cover;
        border-radius: 8px 0 0 8px;
        transition: transform 0.3s ease-in-out;
    }

    .article-item:hover .article-image {
        transform: scale(1);
    }

    .article-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex: 1;
        padding: 0 1rem;
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .article-content a {
        color: #f8f9fa;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .article-content a:hover {
        color: #007bff;
    }
</style>

<div class="container-fluid py-5 page-header" style="background-image: url('<?= base_url('asset-user/images/toko_kue1.jpeg'); ?>'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
        <?php foreach ($profil as $perusahaan) : ?>
            <h3 class="display-2 text-white mb-4 animated slideInDown text-shadow">
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
                    <span><?php echo lang('Blog.headerArticle');  ?></span>
                </p>
            </ol>
        </nav>
    </div>
</div>

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikel->foto_artikel); ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikel->created_at)); ?></a>
                        </div>
                        <h1 class="display-5 mb-2 article-title">
                            <?= (session('lang') === 'id') ? $artikel->judul_artikel : $artikel->judul_artikel_en; ?>
                        </h1>
                        <p class="fs-5">
                            <?= (session('lang') === 'id') ? $artikel->deskripsi_artikel : $artikel->deskripsi_artikel_en; ?>
                        </p>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary"><?php echo lang('Blog.readd') ?></h5>
                    </div>
                    <br>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($artikel_lain as $artikel_item) : ?>
                            <a href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>" class="text-decoration-none">
                                <div class="d-flex align-items-center bg-white mb-3 article-item">
                                    <img class="img-fluid article-image  border" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" alt="">
                                    <div class="w-100 h-100 d-flex flex-column justify-content-center border-left-0 article-content">
                                        <div class="mb-2">
                                            <small class="text-body"><?= date('d F Y', strtotime($artikel_item->created_at)); ?></small>
                                        </div>
                                        <h6 class="m-0 display-7">
                                            <?= (session('lang') === 'id') ? substr($artikel_item->judul_artikel, 0, 30) : substr($artikel_item->judul_artikel_en, 0, 30) ?>...
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?= $this->endSection('content'); ?>