<?php
/**
 * Template Name: Home Page
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php';?>

	<?php require_once VW_BAKERY_PRO_EXT_DIR. '/template-parts/home/slider.php'; ?>
	<?php require_once VW_BAKERY_PRO_EXT_DIR. '/template-parts/home/section-home-contact-details.php'; ?>
	
	<?php
	$section_order ='';
	$section_order = explode( ',', get_theme_mod( 'vw_bakery_pro_section_ordering_settings_repeater') );
	
    foreach( $section_order as $key => $value ){
	   if($value !=''){ 

	   	include VW_BAKERY_PRO_PLUGIN_PATH. '/template-parts/home/section-'.$value.'.php';

        }
    } 

require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php';?>