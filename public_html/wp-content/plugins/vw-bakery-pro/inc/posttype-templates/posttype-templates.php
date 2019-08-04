<?php
/* Single Testimonial Post Type */
function vw_bakery_pro_single_testimonials($single_template) {
	global $post;
	if ($post->post_type == 'testimonials') {
		$single_template = dirname( __FILE__ ) . '/single-testimonial.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_bakery_pro_single_testimonials' );

/* Single Team Post Type */
function vw_bakery_pro_single_project($single_template) {
	global $post;
	if ($post->post_type == 'team') {
		$single_template = dirname( __FILE__ ) . '/single-team.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_bakery_pro_single_project' );