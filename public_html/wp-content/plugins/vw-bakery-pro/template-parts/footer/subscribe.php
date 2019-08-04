<div class="subscribe">
	<div class="row">
		<?php if ( get_theme_mod('vw_bakery_pro_subscribe_title') != '' || get_theme_mod('vw_bakery_pro_subscribe_subtitle') != '' || get_theme_mod('vw_bakery_pro_subscribe_form_code') != '') { ?>
			<?php if(get_theme_mod('vw_bakery_pro_footer_subscribe',true)!= ""){?>
		  	<div class="subscribe_box w-100">
		    	<h4><?php echo esc_html(get_theme_mod('vw_bakery_pro_subscribe_title')); ?></h4>
		    	<p><?php echo esc_html(get_theme_mod('vw_bakery_pro_subscribe_subtitle')); ?></p>
		    	<?php echo do_shortcode(get_theme_mod('vw_bakery_pro_subscribe_form_code')); ?>
			</div>
		<?php } ?>
	</div>
</div>
<div class="footer_menu">
<?php 
	wp_nav_menu( array( 
	    'theme_location' => 'vw_footer_menu',
	    'container_class' => 'footer_menu clearfix' ,
	    'menu_class' => 'clearfix',
	    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	    'fallback_cb' => 'wp_page_menu',
	)); 
?>
</div>
<?php }?>