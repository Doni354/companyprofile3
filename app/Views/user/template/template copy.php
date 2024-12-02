<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <?php foreach ($profil as $perusahaan) : ?>
    <link rel="shortcut icon" href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>">
  <?php endforeach; ?>
  <meta name="description" content="<?php echo $Meta; ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Open+Sans&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/aos.css">
  <link href="<?= base_url('asset-user') ?>/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/style.css">

  <title>
    <?php echo $Title; ?> | <?php foreach ($profil as $descper) : ?><?= $descper->nama_perusahaan; ?><?php endforeach; ?>
  </title>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <?= $this->include('user/layout/header'); ?>

    <!-- render halaman konten -->
    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <?= $this->include('user/layout/footer');  ?>

    <!-- lang -->
    <div class="floating-container">
      <div class="floating-button">
        <img src="<?= base_url('asset-user') ?>/images/lang2.png" style="height: 40px;" alt="languange">
      </div>
      <div class="element-container">

        <!-- indonesia -->
        <a class="leng" href="<?= site_url('lang/in') ?>">
          <span class="float-element tooltip-left">
            <i class="material-icons">
              <img src="<?= base_url('asset-user') ?>/images/ind.png" style="height: 35px;" alt="">
            </i></a>
        </span>
        <!-- english -->
        <a class="leng" href="<?= site_url('lang/en') ?>">
          <span class="float-element">
            <i class="material-icons">
              <img src="<?= base_url('asset-user') ?>/images/en.png" style="height: 35px;" alt="">
            </i></a>
        </span>

      </div>
    </div>

    <!-- lang 2 -->
    <!-- .site-wrap -->

    <!-- icon wa -->
    <?php foreach ($profil as $iconwa) : ?>
      <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
      </a>
    <?php endforeach; ?>

    <!-- loader -->
    <div id="loader" class="show fullscreen">
      <img src="/asset-user/images/loading.gif" alt="Loading" class="gif-loader">
    </div>


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


    <!-- script local slider -->
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // js dot
      function dotslide(n) {
        showSlides(slideIndex = n);
      }
      // end js dot

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        var dot = document.getElementsByClassName("dot");

        if (n > slides.length) {
          slideIndex = 1;

        }
        if (n < 1) {
          slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        // for dot
        for (i = 0; i < slides.length; i++) {
          dot[i].className = dot[i].className.replace(" active", "");
        }
        // end for dot
        slides[slideIndex - 1].style.display = "block";
        // dot
        dot[slideIndex - 1].className += " active";
      }

      // lang

      $(document).ready(function() {
        $('.floatingButton').on('click',
          function(e) {
            e.preventDefault();
            $(this).toggleClass('open');
            if ($(this).children('.fa').hasClass('fa-plus')) {
              $(this).children('.fa').removeClass('fa-plus');
              $(this).children('.fa').addClass('fa-close');
            } else if ($(this).children('.fa').hasClass('fa-close')) {
              $(this).children('.fa').removeClass('fa-close');
              $(this).children('.fa').addClass('fa-plus');
            }
            $('.floatingMenu').stop().slideToggle();
          }
        );
        $(this).on('click', function(e) {

          var container = $(".floatingButton");
          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) {
            if (container.hasClass('open')) {
              container.removeClass('open');
            }
            if (container.children('.fa').hasClass('fa-close')) {
              container.children('.fa').removeClass('fa-close');
              container.children('.fa').addClass('fa-plus');
            }
            $('.floatingMenu').hide();
          }

          // if the target of the click isn't the container and a descendant of the menu
          if (!container.is(e.target) && ($('.floatingMenu').has(e.target).length > 0)) {
            $('.floatingButton').removeClass('open');
            $('.floatingMenu').stop().slideToggle();
          }
        });
      });

      // script readmore
    </script>
    <!-- end script local slider -->

    <!-- <script src="js/test.js"></script> -->

    <!-- untuk menambahkan class="active" pada <li> di navbar -->
    <script>
      // Ambil URL halaman saat ini
      var currentURL = window.location.href;

      // Dapatkan daftar semua elemen <a> di dalam <ul> menu
      var menuLinks = document.querySelectorAll(".site-menu a");

      // Cek apakah URL yang diakses hanya '/' atau hanya domain saja
      if (currentURL === window.location.origin + '/') {
        // Loop melalui setiap tautan menu untuk mencari tautan '/user/home'
        for (var i = 0; i < menuLinks.length; i++) {
          var menuLink = menuLinks[i];

          if (menuLink.getAttribute("href") === "<?= base_url('user/home') ?>") {
            // Tambahkan kelas "active" ke elemen <li> terkait
            menuLink.parentNode.classList.add("active");
            break; // Keluar dari loop setelah menemukan tautan '/user/home'
          }
        }
      } else {
        // Jika URL bukan hanya '/' atau hanya domain, lakukan seperti sebelumnya
        for (var i = 0; i < menuLinks.length; i++) {
          var menuLink = menuLinks[i];

          // Jika URL pada tautan menu adalah substring dari URL halaman saat ini
          if (currentURL.includes(menuLink.href)) {
            // Tambahkan kelas "active" ke elemen <li> terkait
            menuLink.parentNode.classList.add("active");
          }
        }
      }
    </script>
    <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
</body>

</html>