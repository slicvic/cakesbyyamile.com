<?php 
$section_hide = get_theme_mod( 'vw_bakery_pro_slider_enabledisable' );
if ( 'Disable' == $section_hide ) {
  return;
}
$number = get_theme_mod('vw_bakery_pro_slide_number');
$slide_delay = get_theme_mod('vw_bakery_pro_slide_delay'); 
  if($number != ''){
?>
  <section id="<?php echo VW_BAKERY_STYLES ?>slider">
          <div id="carouselExampleIndicators" class="carousel slide <?php if ( get_theme_mod('vw_bakery_pro_slide_remove_fade') == "0" ) { ?> carousel-fade <?php } ?>" data-ride="carousel" data-interval="<?php echo esc_attr($slide_delay); ?>">
        <div class="carousel-inner" role="listbox">
          <?php for ($i=1,$j=1; $i<=$number; $i++,$j++) { 
            if($j>3){ $j=1; } ?>
            <?php if(get_theme_mod('vw_bakery_pro_slide_image'.$i) != ''){ ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if ( get_theme_mod('vw_bakery_pro_slide_image'.$i,true) != "" ) {?>
                  <img class="w-100" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_slide_image'.$i)); ?>" alt="<?php echo esc_attr(get_theme_mod('vw_bakery_pro_slide_title'.$i, true)); ?>" title="#slidecaption<?php echo esc_html($i); ?>">
                <?php } ?>
                <?php if ( get_theme_mod('vw_bakery_pro_slide_heading'.$i,true) != "" || get_theme_mod('vw_bakery_pro_slide_text'.$i,true) != "") {?>
                <div class="carousel-caption d-none d-md-block">
                  <div class="inner_carousel">
                    <h2 class="font-weight-bold"><?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_heading'.$i)); ?></h2>
                    <div class="icon_img"><img class="mt-2 mb-2" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_slide_heading_image')); ?>" alt="Image"/></div>
                    <p><?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_text'.$i)); ?></p>
                    <?php if( get_theme_mod('vw_bakery_pro_slide_btntext'.$i, true) != ''){ ?>
                      <a class="read-more font-weight-bold btn btn-primary theme_button" href="<?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_btnurl'.$i)); ?>"><?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_btntext'.$i)); ?></a>
                    <?php } ?>
                    <?php if( get_theme_mod('vw_bakery_pro_slide_btntext2'.$i, true) != ''){ ?>
                      <a class="ml-3 read-more font-weight-bold btn btn-primary theme_white_button" href="<?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_btnurl2'.$i)); ?>"><?php echo esc_html(get_theme_mod('vw_bakery_pro_slide_btntext2'.$i)); ?></a>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
          <div class="">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
              <span class="sr-only"><?php esc_html_e('Previous','vw-bakery-pro'); ?></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
              <span class="sr-only"><?php esc_html_e('Next','vw-bakery-pro'); ?></span>
            </a>
          </div>
      </div> 
      <div class="clearfix"></div>
  </section>
<?php 
  }
?>