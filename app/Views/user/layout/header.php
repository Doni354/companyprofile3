
 <div class="container-fluid py-3 px-lg-5">
     <div class="row justify-content-center">
         <?php foreach ($profil as $header) : ?>
             <div class="col-lg-8 text-center text-lg-right">
                 <!--<div class="d-inline-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-end">-->
                     <!--<div class="text-center pr-3 border-right mb-3 mb-lg-0">-->
                     <!--    <h6 class="custom-font">Indonesia</h6>-->
                     <!--    <p class="m-0 custom-font"><?= $header->alamat; ?></p>-->
                     <!--</div>-->
                     <!--<div class="text-center px-3 border-right mb-3 mb-lg-0">-->
                     <!--    <h6 class="custom-font"><?php echo lang('Blog.notelp'); ?></h6>-->
                     <!--    <p class="m-0 custom-font"><?= $header->no_hp; ?></p>-->
                     <!--</div>-->
                     <!--<div class="text-center pl-3">-->
                     <!--    <h6 class="custom-font"><?php echo lang('Blog.email'); ?></h6>-->
                     <!--    <p class="m-0 custom-font"><?= $header->email; ?></p>-->
                     <!--</div>-->
                 <!--</div>-->
             </div>
         <?php endforeach; ?>
     </div>
 </div>