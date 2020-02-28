<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogger_buzz
 */

get_header();

$page_layout = get_theme_mod('blogger_buzz_blog_layout','grid_right_sidebar');

if ($page_layout == 'grid_no_sidebar' || $page_layout == 'grid_two_nsidebar') { 

	$col = 12 ;

}else{

	$col = 9 ;

}

if ($page_layout == 'grid_two_rsidebar' || $page_layout == 'grid_two_lsidebar' || $page_layout == 'grid_two_nsidebar' ) {

	$class = 'blog-style-three' ;

}elseif ( $page_layout == 'split' ) {
	
	$class = 'blog-style-two' ;
}

get_header(); ?>

	<div class="container">
	    <div class="row">

	    	<?php if ( $page_layout == 'grid_left_sidebar' || $page_layout == 'grid_two_lsidebar' ) { get_sidebar ( 'left' ) ; } ?>

			<div id="primary" class="content-area col-lg-<?php echo intval($col); ?> col-md-12 col-sm-12">
				<main id="main" class="site-main">
					<div class = "blog-style <?php echo esc_attr( $class ); ?>">

						<?php
							if ( have_posts() ) :

		                        echo '<div class="'.esc_attr('blog_style_inner').'">';

									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_format() );

									endwhile;

		                        echo '</div>';
		                        
								blogger_buzz_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php if ( $page_layout == 'grid_right_sidebar' || $page_layout == 'grid_two_rsidebar' || $page_layout == 'split' ) { get_sidebar () ; } ?>

		</div>
	</div>
    
<?php get_footer();