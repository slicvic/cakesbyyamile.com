<?php 
  $vw_bakery_pro_records_section = get_theme_mod( 'vw_bakery_pro_our_records_enable' );
  if ( 'Disable' == $vw_bakery_pro_records_section ) {
  return;
  }
  if( get_theme_mod('vw_bakery_pro_our_records_bg_color') ) { 
      $about_backg = 'background-color:'.esc_attr( get_theme_mod('vw_bakery_pro_our_records_bg_color') ).';';
    }elseif( get_theme_mod('vw_bakery_pro_our_records_bg_image') ){
      $about_backg = 'background-image:url(\''.esc_url( get_theme_mod('vw_bakery_pro_our_records_bg_image') ).'\')';
    }else{
      $about_backg = ''; 
    }
  $number =  get_theme_mod('vw_bakery_pro_our_records_number');
?>
<section id="our_records" style="<?php echo esc_attr($about_backg); ?>">
  <div class="container">
    <div class="owl-carousel counter-box">
      <?php
        for ($i=1; $i<=$number; $i++) { ?>
        <div class="counter_inner <?php if($i == 1){ echo 'active';}?>">
          <div class="text-center">
            <?php if( get_theme_mod('vw_bakery_pro_our_records_image'.$i) != ''){ ?>
              <img src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_our_records_image'.$i)); ?>" alt="">
            <?php } ?>
            <h4 class="count mt-3 mb-3"><?php echo esc_html(get_theme_mod('vw_bakery_pro_number_title1'.$i)); ?></h4>
            <p><?php echo esc_html(get_theme_mod('vw_bakery_pro_circle_content1'.$i)); ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="clearfix"></div>
</section>