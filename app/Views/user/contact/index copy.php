<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section site-blocks-cover innerpage" style="background-image: url('../asset-user/images/toko_kue1.jpeg');">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <?php foreach ($profil as $perusahaan) : ?>
                    <h1><?php echo lang('Blog.titleOurContact');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?></h1>
                <?php endforeach; ?>
                <p class="text-white text-center">
                    <a href="<?= base_url('user/home') ?>"><?php echo lang('Blog.headerHome'); ?></a>
                    <span class="mx-2">/</span>
                    <span><?php echo lang('Blog.headerContact'); ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-5">
                <div class="testimonial">
                    <p class="map">
                        <?php foreach ($profil as $maps) :  ?>
                            <?php echo $maps->link_maps ?>
                        <?php endforeach;  ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-5 mb-md-5">
                <div class="testimonial">
                    <?php foreach ($profil as $desc) : ?>
                        <blockquote>
                            <p>
                                <?php if (lang('Blog.Languange') == 'en') {
                                    echo $desc->deskripsi_kontak_en;
                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $desc->deskripsi_kontak_in;
                                } ?>
                            </p>
                        </blockquote>
                        <!-- <img src="images/person_2.jpg" alt="">
                    
                    <p class="client-name">Ben Anderson</p> -->
                    <?php endforeach;  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>