<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/* This is function file of the child theme, this is loaded BEFORE the parent themes function file is loaded , so you can override any function by declaring it here first. */


function bolvo_child_scripts() {
    wp_enqueue_style( 'thme-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'bolvo_child_scripts' );

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below. */
/*-----------------------------------------------------------------------------------*/







/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here. */
/*-----------------------------------------------------------------------------------*/
?>