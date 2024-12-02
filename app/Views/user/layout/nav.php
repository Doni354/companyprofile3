<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <?php foreach ($profil as $header) :  ?>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="<?= base_url('/') ?>" class="navbar-brand">
                    <img class="img-fluid" src="<?= base_url('asset-user/images/' . $header->logo_perusahaan) ?>" alt="Logo" width="90" height="90">
                </a>

                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <?php
                        // Ambil bahasa yang disimpan di session
                        $lang = session()->get('lang') ?? 'en'; // Default ke 'en' jika tidak ada di session

                        // Definisikan tautan untuk setiap halaman berdasarkan bahasa
                        $aboutLink = ($lang === 'en') ? 'about' : 'tentang-kami';
                        $articleLink = ($lang === 'en') ? 'article' : 'artikel';
                        $productLink = ($lang === 'en') ? 'product' : 'produk';
                        $activitiesLink = ($lang === 'en') ? 'activities' : 'aktivitas';
                        $contactLink = ($lang === 'en') ? 'contact' : 'kontak';
                        ?>

                        <!-- Link navigasi dengan bahasa yang sedang aktif -->
                        <a href="<?= base_url($lang . '/') ?>" class="nav-item nav-link <?= uri_string() == '' ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerHome'); ?>
                        </a>
                        <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $aboutLink) ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerAbout'); ?>
                        </a>
                        <a href="<?= base_url($lang . '/' . $articleLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $articleLink) || strpos(uri_string(), $lang . '/' . $articleLink . '/detail') === 0) ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerArticle'); ?>
                        </a>
                        <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $productLink) || strpos(uri_string(), $lang . '/' . $productLink . '/detail') === 0) ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerProducts'); ?>
                        </a>
                        <a href="<?= base_url($lang . '/' . $activitiesLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $activitiesLink) || strpos(uri_string(), $lang . '/' . $activitiesLink . '/detail') === 0) ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerActivities'); ?>
                        </a>
                        <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $contactLink) ? 'active' : '' ?>">
                            <?php echo lang('Blog.headerContact'); ?>
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo lang('Blog.headerLanguange'); ?></a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a class="dropdown-item" href="<?= base_url('id/') ?>">Indonesia</a>
                                <a class="dropdown-item" href="<?= base_url('en/') ?>">English</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <br>
        </div>
    <?php endforeach;  ?>
</div>
<!-- Navbar End -->


<style>
    .nav-link {
        position: relative;
        padding-bottom: 8px;
        font-weight: 500;
        color: #007bff;
        /* Warna teks */
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 4px;
        /* Ketebalan garis bawah */
        background-color: currentColor;
        /* Menggunakan warna yang sama dengan teks */
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .navbar-collapse .nav-link:not(.active)::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 4px;
        /* Ketebalan garis bawah */
        background-color: currentColor;
        transition: width 0.3s ease;
    }
</style>



<!-- Navbar End -->