<!-- Footer Start -->
<div class="container-fluid bg-dark text-white py-5 px-sm-3 px-md-5">
    <?php foreach ($profil as $footer) : ?>
        <?php
        // Extract phone number from WhatsApp link
        $whatsapp_url = $footer->link_whatsapp;
        preg_match('/\d+/', $whatsapp_url, $matches);
        $phone_number = isset($matches[0]) ? $matches[0] : 'N/A';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0 text-center text-lg-left">
                    <p class="font-weight-bold mb-1">
                        <?php echo (lang('Blog.Languange') == 'en') ? 'Phone' : 'Telepon'; ?>
                    </p>
                    <hr style="border: 1px solid #fff; width: 100%; margin: 10px auto;">
                    <p class="mb-2">
                        <a href="tel:+<?= $phone_number; ?>" class="text-white text-decoration-none"><?= $footer->no_hp; ?></a>
                    </p>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <p class="font-weight-bold mb-1">
                        <?php echo (lang('Blog.Languange') == 'en') ? 'Address' : 'Alamat'; ?>
                    </p>
                    <hr style="border: 1px solid #fff; width: 50%; margin: 10px auto;">
                    <p class="mb-2">
                        <?= $footer->alamat; ?>
                    </p>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center text-lg-right"> 
                    <p class="font-weight-bold mb-1">
                        <?php echo (lang('Blog.Languange') == 'en') ? 'Email' : 'Email'; ?>
                    </p>
                    <hr style="border: 1px solid #fff; width: 100%; margin: 10px auto;">
                    <p class="mb-2">
                        <a href="mailto:<?= $footer->email; ?>" class="text-white text-decoration-none"><?= $footer->email; ?></a>
                    </p>
                </div>
            </div>
            <hr style="border: 1px solid #fff; width: 60%; margin: 20px auto;">
            <p class="m-0 text-center text-white">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>. <?= $footer->teks_footer; ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>
<!-- Footer End -->
