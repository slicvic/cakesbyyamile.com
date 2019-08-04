
<?php 
$about_section = get_theme_mod( 'vw_bakery_pro_radio_about_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
/*about us*/
if( get_theme_mod('vw_bakery_pro_about_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_about_bgcolor')).';';
}elseif( get_theme_mod('vw_bakery_pro_about_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_about_bgimage')).'\')';
}else{
  $about_backg = '';
}
?>
<section id="about" style="<?php echo esc_attr($about_backg); ?>">
  <div class="inner_sec">
    <div class="container">
      <div class="row">  
        <?php if( get_theme_mod('vw_bakery_pro_about_section_image', true) == '') {
          $col_size = 'col-lg-12 col-md-12 col-sm-12'; 
        } else{
          $col_size = 'col-lg-6 col-md-6 col-sm-12'; 
        } ?>      
        <div class="<?php echo esc_attr($col_size); ?>">
          <div class="about-content">
            <?php if(get_theme_mod('vw_bakery_pro_about_title') != ''){?>
              <div class="about-heading">
                <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_about_title')); ?></h3>
              </div>
              <?php } ?>       
              <img class="mt-3 mb-2" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_about_heading_image')); ?>" alt="">
                 
            <?php if(get_theme_mod('vw_bakery_pro_about_description') != ''){?>
              <p><?php echo esc_html(get_theme_mod('vw_bakery_pro_about_description')); ?></p>
            <?php } ?>            
            <?php if(get_theme_mod('vw_bakery_pro_viewmore_btn_text') != ''){?>
              <a class="theme_button" href="<?php echo esc_html(get_theme_mod('vw_bakery_pro_viewmore_url')); ?>"><?php echo esc_html(get_theme_mod('vw_bakery_pro_viewmore_btn_text')); ?></a>
            <?php }?>
          </div> 
        </div>
        <?php if( get_theme_mod('vw_bakery_pro_about_section_image') != ''){ ?>
          <div class="about_img col-lg-6 col-md-6 col-sm-12">
            <span class="thumb_image_border"></span>
            <img src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_about_section_image')); ?>" alt="">
          </div>
        <?php }?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>