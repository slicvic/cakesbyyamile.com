<?php
$section_status = get_theme_mod( 'vw_bakery_pro_radio_home_contact_details_enable' );
if ( 'Disable' == $section_status ) {
  return;
}
if ( get_theme_mod( 'vw_bakery_pro_home_contact_details_bgcolor' ) ) {
	$section_backg = 'background-color:' . esc_attr( get_theme_mod( 'vw_bakery_pro_home_contact_details_bgcolor' ) ) . ';';
} elseif ( get_theme_mod( 'vw_bakery_pro_home_contact_details_bgimage' ) ) {
	$section_backg = 'background-image:url(\'' . esc_url( get_theme_mod( 'vw_bakery_pro_home_contact_details_bgimage' ) ) . '\')';
} else {
	$section_backg = '';
}
 if(get_theme_mod('vw_bakery_pro_slider_enabledisable') == 'Disable'){

   $section_backg = "margin-top: 70px;";
 }
?>
<div class="container cont">
	<div class="home_details" style="<?php echo esc_attr($section_backg); ?>">	
		<div class="row">
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="opening_time">
					<?php $count =  get_theme_mod('vw_bakery_pro_home_contact_details_number');
					for($m =1; $m<=$count; $m++){?>
						<div class="media">
						  	<div class="media-body">
						    	<p><?php echo esc_html(get_theme_mod('vw_bakery_pro_home_contact_details_box'.$m)); ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="home_contact_details">
					<p><?php echo esc_html(get_theme_mod('vw_bakery_pro_home_phone_text')); ?></p>
					<?php if( get_theme_mod('vw_bakery_pro_home_phone_number') != ''){ ?>
						<h3><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('vw_bakery_pro_home_phone_number')); ?></h3>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="home_contact_details">
					<p><?php echo esc_html(get_theme_mod('vw_bakery_pro_home_email_text')); ?></p>
					<?php if( get_theme_mod('vw_bakery_pro_home_email_address') != ''){ ?>
						<h3><i class="fas fa-envelope"></i><?php echo esc_html(get_theme_mod('vw_bakery_pro_home_email_address')); ?></h3>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<?php if( get_theme_mod('vw_bakery_pro_contact_homebtn_text') != ''){ ?>
                <a class="read-more font-weight-bold btn btn-primary theme_button" href="<?php echo esc_html(get_theme_mod('vw_bakery_pro_contact_homebtn_url')); ?>"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contact_homebtn_text')); ?></a>
                <?php } ?>
			</div>
		</div>
	</div>
</div>
