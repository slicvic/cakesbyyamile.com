<?php
/**
 * Template to show the content of Gallery section
 *
 * @package vw_bakery_pro
 */ 

$about_section = get_theme_mod( 'vw_bakery_pro_radio_gallery_enable' );
if ( 'Disable' == $about_section ) {
  return;
}

/* Galleyr */
if( get_theme_mod('vw_bakery_pro_gallery_bgcolor') ) { 
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_gallery_bgcolor')).';';
}elseif( get_theme_mod('vw_bakery_pro_gallery_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_gallery_bgimage')).'\')';
}else{
  $about_backg = '';   
}

?>
<section id="vw_gallery" style="<?php echo esc_attr($about_backg); ?>">
	<div class="container">
		<?php if(get_theme_mod('vw_bakery_pro_gallery_section_title',true) != ''){?>
        	<h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_gallery_section_title'));?></h3>
        <?php }?>
        <img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_gallery_section_title_image')); ?>" alt="Image"/>
	    <?php if ( defined( 'VW_GALLERY_IMAGES_VERSION' ) ) { ?>
	      <div class="school-shortcode">
	        <?php echo do_shortcode(get_theme_mod('vw_bakery_pro_gallery_shortcode')); ?>
	      </div>
	    <?php } else{ ?>
	      <h3 class="text-center"><?php echo esc_html_e('Please install VW Gallery Images plugin and add your Gallery to enable this section','vw-bakery-pro')?></h3>
	    <?php }?>
	</div>
    <div class="clearfix"></div>
</section>