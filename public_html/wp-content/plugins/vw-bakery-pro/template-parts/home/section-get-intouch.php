<?php
$section_status = get_theme_mod( 'vw_bakery_pro_radio_getintouch_enable' );
if ( 'Disable' == $section_status ) {
  return;
}
if ( get_theme_mod( 'vw_bakery_pro_getintouch_bgcolor' ) ) {
	$section_backg = 'background-color:' . esc_attr( get_theme_mod( 'vw_bakery_pro_getintouch_bgcolor' ) ) . ';';
} elseif ( get_theme_mod( 'vw_bakery_pro_getintouch_bgimage' ) ) {
	$section_backg = 'background-image:url(\'' . esc_url( get_theme_mod( 'vw_bakery_pro_getintouch_bgimage' ) ) . '\')';
} else {
	$section_backg = '';
}
?>
<section id="getintouch" style="<?php echo esc_attr($section_backg); ?>">	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php do_action('vw_bakery_pro_before_map'); ?>
					<section class="google-map text-center p-0" id="map">
						<?php if ( get_theme_mod('vw_bakery_pro_address_latitude',true) != "" && get_theme_mod('vw_bakery_pro_address_longitude',true) != "" ) {?>
							<embed width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('vw_bakery_pro_address_latitude')); ?>,<?php echo esc_attr(get_theme_mod('vw_bakery_pro_address_longitude')); ?>&hl=es;z=14&amp;output=embed"></embed>
						<?php }?>
					</section>
				<?php do_action('vw_bakery_pro_after_map'); ?>
			</div>
			<div class="col-md-6">
				<div class="contact_box">
					<?php $count =  get_theme_mod('vw_bakery_pro_getintouch_number');
					for($m =1; $m<=$count; $m++){?>
						<div class="row mt-3 mb-3">
							<?php if ( get_theme_mod('vw_bakery_pro_getintouch_box_icon', true) != '') { ?>
								<div class="col-md-2 col-sm-2 contact_icon">								
								  	<i class="<?php echo esc_html(get_theme_mod('vw_bakery_pro_getintouch_box_icon'.$m)); ?>"></i>	  	
								</div>
							<?php } ?>
							<?php if ( get_theme_mod('vw_bakery_pro_getintouch_box', true) != '') { ?>
							  	<div class="col-md-10 col-sm-10 contact_text">
							    	<p><?php echo esc_html(get_theme_mod('vw_bakery_pro_getintouch_box'.$m)); ?></p>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if(get_theme_mod('vw_bakery_pro_header_social_icons',true) != ''){ ?>
						  <?php include VW_BAKERY_PRO_PLUGIN_PATH.'template-parts/home/social-icons.php'; ?>
		            <?php } ?>
				</div>
			</div>			
		</div>
	</div>	
</section>