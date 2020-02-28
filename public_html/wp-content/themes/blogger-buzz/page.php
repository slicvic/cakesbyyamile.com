<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogger_buzz
 */

get_header(); 

$sidebar = esc_attr( get_post_meta($post->ID, 'blogger_buzz_page_layouts', true ) );

if(!$sidebar){
    $sidebar = 'rightsidebar';
}

if ($sidebar == 'nosidebar') {
	$col = 12;
}
else{
	$col = 9;
}

?>
<div class="container">
    <div class="row">
		
		<?php if ($sidebar == 'leftsidebar') { get_sidebar('left'); } ?>

		<div id="primary" class="content-area col-lg-<?php echo intval( $col ); ?> col-md-12 col-sm-12 col-xs-12">
			<main id="main" class="site-main">
				<div class="blog-style single-page">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ($sidebar == 'rightsidebar') { get_sidebar(); } ?>

	</div>
</div>

<?php get_footer();
