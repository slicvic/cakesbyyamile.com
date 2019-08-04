<?php 
$about_section = get_theme_mod( 'vw_bakery_pro_services_tab_enabledisable' );
if ( 'Disable' == $about_section ) {
  return;
}
/*Services Area*/
if( get_theme_mod('vw_bakery_pro_services_tab_bgcolor','') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_services_tab_bgcolor','')).';';
}elseif( get_theme_mod('vw_bakery_pro_services_tab_bgimage','') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_services_tab_bgimage')).'\')';
}else{
  $about_backg = '';
}
$count =  get_theme_mod('vw_bakery_pro_services_tab_number');
?>
<section id="services" style="<?php echo esc_attr($about_backg); ?>">
  <div class="container"> 
      <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_services_tab_sec_title'));?></h3>
      <img class="mt-3 mb-2" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_services_heading_image')); ?>" alt="">
      <div class="owl-carousel">
        <?php for($i=1, $j=1; $i<=$count; $i++,$j++){?>
          <div class="<?php if($i==1){ echo 'active'; } ?>">
            <div class="service-box">
              <?php if( get_theme_mod('vw_bakery_pro_services_tab_image'.$i, true) != ''){ ?>
                <img class="feature-img mt-3 mb-3" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_services_tab_image'.$i)); ?>" alt="Image"/>
              <?php } ?>
              <h4><a href="<?php echo esc_html(get_theme_mod('vw_bakery_pro_services_title_url'.$i)); ?>"><?php echo esc_html(get_theme_mod('vw_bakery_pro_services_title'.$i)); ?></a></h4>              
              <p><?php echo get_theme_mod('vw_bakery_pro_services_tab_content'.$i); ?></p> 
            </div>
          </div>
        <?php }?>
      </div>
    <div class="clearfix"></div>
  </div>
</section>