<?php
/**
 * Template Name: Contact
*/
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/template-parts/banner.php'; ?>
<?php do_action('vw_bakery_pro_before_contact_title'); ?>
<div class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="contact-info">
					<?php if ( get_theme_mod('vw_bakery_pro_address_title',true) != "" ) { ?>
					<div class="contact-address">
						<div class="inner-cont">
							<div class="c_content media-small">
								<span class="font-weight-bold text-uppercase"><?php echo esc_html(get_theme_mod('vw_bakery_pro_address_title')); ?></span>
								<p class="m-0"><?php echo esc_html(get_theme_mod('vw_bakery_pro_address')); ?></p>
							</div>
						</div>
					</div>
					<?php }?>
					<?php if ( get_theme_mod('vw_bakery_pro_contactpage_email_title',true) != "" ) { ?>
					<div class="contact-email">
						<div class="inner-cont">								
							<div class="c_content media-small">
								<span class="w-100 font-weight-bold text-uppercase"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_email_title')); ?></span>
								<p class="m-0"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_email')); ?></p>
							</div>
						</div>
					<?php }?>
					</div>				
					<?php if ( get_theme_mod('vw_bakery_pro_contactpage_phone_title',true) != "" ) { ?>
					<div class="contact-phone">
						<div class="inner-cont">								
							<div class="c_content media-small">
				 				<span class="font-weight-bold text-uppercase"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_phone_title')); ?></span>
				 				<p class="m-0"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_phone')); ?></p>
				 			</div>
				 		</div>
		 			</div>
		 			<?php }?>		 			
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="contac_form">
					<div class="text-center">
						<?php if(get_theme_mod('vw_bakery_pro_contactpage_form_title') != ''){?>
					      <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_form_title')); ?></h3>
					    <?php }
					    if(get_theme_mod('vw_bakery_pro_contactpage_form_subtitle') != ''){ ?>
					      <p class="subtitle"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_form_subtitle')); ?></p>
					    <?php } ?>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
			        	<?php the_content(); ?>
			    	<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-3">
				<div class="contact-phone">
					<div class="inner-cont">							
						<div class="c_content media-small">
			 				<span class="font-weight-bold text-uppercase"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_working_hours_title')); ?></span>
			 				<?php $working_number =  get_theme_mod('vw_bakery_pro_contactpage_working_number');
							for($i =1; $i<=$working_number; $i++) { ?>
				 				<p class="mt-2 mb-2"><?php echo esc_html(get_theme_mod('vw_bakery_pro_contactpage_working_hours'.$i)); ?></p>
				 			<?php } ?>			 				
			 			</div>
			 		</div>
	 			</div>
		 	</div>
 		</div>
	</div>	
	<?php do_action('vw_bakery_pro_before_map'); ?>
		<section class="google-map text-center p-0" id="map">
			<?php if ( get_theme_mod('vw_bakery_pro_address_latitude',true) != "" && get_theme_mod('vw_bakery_pro_address_longitude',true) != "" ) {?>
			  <embed width="100%" height="325" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('vw_bakery_pro_address_latitude','21.145800')); ?>,<?php echo esc_attr(get_theme_mod('vw_bakery_pro_address_longitude','79.088155')); ?>&hl=es;z=14&amp;output=embed"></embed>
			<?php }?>
		</section>
	<?php do_action('vw_bakery_pro_after_map'); ?>
</div>
<?php do_action('vw_bakery_pro_before_footer'); ?>

<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php';?>