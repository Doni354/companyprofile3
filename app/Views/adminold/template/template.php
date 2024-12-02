<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js') ?>"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css') ?>">

    <!-- test -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="<?= base_url('assets/js/tinymce.min.js') ?>"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tiny', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
    </script>
    <!-- end test -->

</head>

<body class="app">
    <?= $this->include('admin/layout/header'); ?>

    <div class="app-wrapper">

        <?= $this->renderSection('content'); ?>

    </div>

    <script src="<?= base_url('assets/plugins/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>


    <!-- Page Specific JS -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script src="<?= base_url('assets') ?>/js/lazysizes.min.js"></script>
    <!--  -->

    <!-- Menambahkan class active pada navbar -->
    <script>
        // Ambil URL saat ini
        var currentUrl = window.location.href;

        // Dapatkan semua elemen tautan di dalam navbar
        var navLinks = document.querySelectorAll("#app-nav-main .nav-link");

        // Loop melalui setiap tautan untuk memeriksa URL saat ini
        navLinks.forEach(function(link) {
            // Dapatkan href dari tautan
            var linkHref = link.getAttribute("href");

            // Cek apakah URL saat ini mengandung substring terkait dan tambahkan kelas "active" ke tautan yang sesuai
            if (
                (currentUrl.indexOf("admin/dashboard") !== -1 && linkHref.indexOf("admin/dashboard") !== -1) ||
                (currentUrl.indexOf("produk") !== -1 && linkHref.indexOf("produk") !== -1) ||
                (currentUrl.indexOf("slider") !== -1 && linkHref.indexOf("slider") !== -1) ||
                (currentUrl.indexOf("aktivitas") !== -1 && linkHref.indexOf("aktivitas") !== -1) ||
                (currentUrl.indexOf("profil") !== -1 && linkHref.indexOf("profil") !== -1)
            ) {
                link.classList.add("active");
            }
        });
    </script>
</body>

</html>