<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <?php
  $lang = session()->get('lang') ?? 'en';
  ?>
  <meta name="title" content="<?=
                              ($lang === 'en' ?
                                ($meta->meta_title_en ?? $artikel->meta_title_artikel_en ?? $tbproduk->meta_title_produk_en ?? $tbaktivitas->meta_title_aktivitas_en ?? 'INDONESIAN-EXPORTER 2') : ($meta->meta_title ?? $artikel->meta_title_artikel ?? $tbproduk->meta_title_produk ?? $tbaktivitas->meta_title_aktivitas ?? 'INDONESIAN-EXPORTER'))
                              ?>">
  <meta name="description" content="<?=
                                    ($lang === 'en' ?
                                      ($meta->meta_description_en ?? $artikel->meta_description_artikel_en ?? $produk->meta_description_produk_en ?? $aktivitas->meta_description_en ?? 'Default description for Sofi Cookies') : ($meta->meta_description ?? $artikel->meta_description_artikel ?? $produk->meta_description_produk ?? $aktivitas->meta_description ?? 'Default description for Sofi Cookies'))
                                    ?>">
  <!-- Canonical Tag -->
  <link rel="canonical" href="<?= $canonicalUrl ?? current_url() ?>">

  <title>
    <?=
    ($lang === 'en' ?
      ($meta->meta_title_en ?? $artikel->meta_title_artikel_en ?? $tbproduk->meta_title_produk_en ?? $tbaktivitas->meta_title_aktivitas_en ?? 'INDONESIAN-EXPORTER') : ($meta->meta_title ?? $artikel->meta_title_artikel ?? $tbproduk->meta_title_produk ?? $tbaktivitas->meta_title_aktivitas ?? 'INDONESIAN-EXPORTER'))
    ?>
  </title> <!-


    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="author" content="Untree.co">
    <?php foreach ($profil as $perusahaan) : ?>
      <link rel="shortcut icon" href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>">
    <?php endforeach; ?>



    <!-- Favicon -->
    <?php foreach ($profil as $perusahaan) : ?>
      <link href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>" rel="icon">
    <?php endforeach; ?>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">
</head>
<?= $this->include('user/layout/header'); ?>
<?= $this->include('user/layout/nav'); ?>
<!-- render halaman konten -->
<?= $this->renderSection('content'); ?>
<?= $this->include('user/layout/footer');  ?>

<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Slick Theme CSS (Optional) -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />



<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
  </div>
  <!-- Spinner End -->

  <!-- icon wa -->
  <?php foreach ($profil as $iconwa) : ?>
    <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="_blank" style="position: fixed; bottom: 30px; right: 10px; z-index: 1000;">
      <img data-src="<?= base_url('asset-user/images/iconwa.png'); ?>" alt="WhatsApp" class="my-float lazyload" style="width: 80px; height: auto; padding: 10px; transition: background-color 0.3s ease-in-out;">
    </a>
  <?php endforeach; ?>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/wow/wow.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/waypoints/waypoints.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery-ui.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/popper.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/bootstrap.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/owl.carousel.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.countdown.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/aos.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.fancybox.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.sticky.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>
  <!-- Template Javascript -->
  <script src="<?= base_url('asset-user') ?>/js/main.js"></script>

  <!-- jQuery (Jika belum disertakan) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Slick JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>