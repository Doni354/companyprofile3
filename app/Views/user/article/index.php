<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

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
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column text-center mb-5 mt-5">
                <h1 class="mb-4 display-6 section-title text-center"><?php echo lang('Blog.titleNewArticle') ?></h1>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <?php foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'article' : 'artikel') . '/' . ($lang === 'en' ? $row->slug_en : $row->slug_id)) ?>" class="text-decoration-none">
                        <div class="card-article position-relative d-flex flex-column h-100 mb-3">
                            <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                            <div class="bg-white border border-top-0 p-4 flex-grow-1">
                                <div class="mb-2">
                                    <p><?= date('d F Y', strtotime($row->created_at)); ?></p>
                                </div>
                                <h4 class="display-5" style="font-size: 25px;">
                                    <?= (session('lang') === 'id') ? substr(strip_tags($row->judul_artikel), 0, 40) : substr(strip_tags($row->judul_artikel_en), 0, 40) ?>...
                                </h4>
                                <p>
                                    <?= (session('lang') === 'id') ? substr(strip_tags($row->deskripsi_artikel), 0, 40) : substr(strip_tags($row->deskripsi_artikel_en), 0, 40) ?>...
                                </p>
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

    .card-article {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-article:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-article img {
        transition: transform 0.3s ease-in-out;
        transform-origin: center;
    }

    .card-article:hover img {
        transform: scale(1);
    }
</style>

<?= $this->endSection('content'); ?>