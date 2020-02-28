<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cakecious
 */

get_header(); ?>
<section class="error_area">
    <div class="container">
		<div class="error_inner">
			<div class="error_inner_text">
				<h3><?php esc_html_e('404', 'cakecious'); ?></h3>
				<h4><?php esc_html_e('Oops! That page can not be found', 'cakecious'); ?></h4>
				<h5><?php esc_html_e('Sorry, but the page you are looking for does not exist.', 'cakecious'); ?></h5>
				<a class="pink_btn" href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e('Go to home page', 'cakecious'); ?></a>
			</div>
		</div>
    </div>
</section>

<?php get_footer(); ?>