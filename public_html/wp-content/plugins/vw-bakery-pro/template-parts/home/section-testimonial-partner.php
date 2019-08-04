<?php 
$mission_enable = get_theme_mod( 'vw_bakery_pro_radio_testimonial_partner_enable' );
if ( 'Disable' == $mission_enable ) {
  return;
}
if( get_theme_mod('vw_bakery_pro_testimonial_partner_bgcolor') ) { 
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_testimonial_partner_bgcolor')).';';
}elseif( get_theme_mod('vw_bakery_pro_testimonial_partner_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_testimonial_partner_bgimage')).'\')';
}else{
  $about_backg = '';   
}
?>
<section id="testimonial_partner" style="<?php echo esc_html($about_backg); ?>">
	<div class="container">		
		<div class="row">
			<div class="<?php if (get_theme_mod( 'vw_bakery_pro_radio_testimonial_enable',true ) ==  'Enable'){ echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?> ">
				<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'template-parts/home/our-partners.php'; ?>
			</div>
			<div class="<?php if (get_theme_mod( 'vw_bakery_pro_radio_our_partners_enable',true ) ==  'Enable'){ echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
			<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'template-parts/home/testimonial.php'; ?>
			</div>			
		</div>
	</div>
</section>