<?php 
$about_section = get_theme_mod( 'vw_bakery_pro_radio_our_partners_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
?>
<section id="our_partners">
  <div class="container">
    <?php if(get_theme_mod('vw_bakery_pro_partners_title',true) != ''){?>
      <div class="text-center">
        <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_partners_title')); ?></h3>
      </div>
    <?php }?>
    <div class="text-center">
      <img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_partners_title_image')); ?>" alt="Image"/>
    </div>
    <div class="partners_inner">     
      <div class="row">
        <?php
          $number = get_theme_mod('vw_bakery_pro_our_partners_number');
          for ($i=1; $i<=$number; $i++) {            
            if ( get_theme_mod('vw_bakery_pro_our_partners_number',true) != "" ) { ?>
            <div class="col-md-6 col-sm-6 col-6 text-center">
              <?php if( get_theme_mod('vw_bakery_pro_our_partners_image'.$i, true) != ''){ ?>
                  <img class="feature-img mt-3 mb-3" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_our_partners_image'.$i)); ?>" alt="Image"/>
              <?php } ?>
            </div>
          <?php }
          } ?> 
      </div>
    </div>
  </div>
</section>