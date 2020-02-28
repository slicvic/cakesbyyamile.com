<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/*-----------------------------------------------------------------------------------*/
/* Initiating shortcodes.
/*-----------------------------------------------------------------------------------*/


include TT_FW_ROOT . '/inc/shortcodes/social.php';
//Include Post sc
if ( ! empty( $tt_temptt_components['post_shortcodes'] ) ) {
	include TT_FW_ROOT . '/inc/shortcodes/posts.php';
}
//Include Hero sc
if ( '1' === $tt_temptt_components['ttnew_hero_sc'] ) {
	include TT_FW_ROOT . '/inc/shortcodes/ttnew-hero-sc.php';
}