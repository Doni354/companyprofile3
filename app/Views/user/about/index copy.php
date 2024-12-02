<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section site-blocks-cover innerpage" style="background-image: url('../asset-user/images/toko_kue1.jpeg');">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <h1><?php echo lang('Blog.titleAboutUs'); ?></h1>
                <p class="text-white text-center">
                    <a href="<?= base_url('user/home') ?>"><?php echo lang('Blog.headerHome'); ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerAbout'); ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="site-section pb-0">
    <div class="block-2">
        <?php foreach ($profil as $descper) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img data-src="/asset-user/images/<?= $descper->foto_utama; ?>" alt="Logo Utama" class="img-fluid img-overlap lazyload">
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <h3 class="section-subtitle text-white opacity-50"><?php echo lang('Blog.titleAboutUs')  ?></h3>
                        <h1 class="section-title mb-4"><?= $descper->nama_perusahaan; ?></h1>
                        <p class="opacity-50">
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo $descper->deskripsi_perusahaan_en;
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo $descper->deskripsi_perusahaan_in;
                            } ?>
                        </p>
                        <!-- <div class="button">
                            <a href="about"><?php echo lang('Blog.btnReadmore'); ?></a>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection('content'); ?>