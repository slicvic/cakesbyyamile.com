<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bakes_And_Cakes
 */

$sidebar_layout = bakes_and_cakes_sidebar_layout(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="text-holder">
		
		<header class="entry-header">
            <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php if( has_post_thumbnail() ){ ?>
		    <div class="post-thumbnail">
		        <?php ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'bakes-and-cakes-image', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'bakes-and-cakes-image-full', array( 'itemprop' => 'image' ) ) ; ?>
		    </div>
		<?php }?>
		
		<div class="entry-content" itemprop="text">
			<?php the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakes-and-cakes' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
					/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'bakes-and-cakes' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
