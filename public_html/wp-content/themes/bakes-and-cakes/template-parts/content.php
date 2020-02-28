<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bakes_And_Cakes
 */
$ed_full_content = get_theme_mod( 'bakes_and_cakes_ed_full_content' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

     <?php 
        if( has_post_thumbnail() ){
            echo ( is_single() ) ? '<div class="post-thumbnail">' : '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
            ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'bakes-and-cakes-image', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'bakes-and-cakes-image-full', array( 'itemprop' => 'image' ) );
            echo ( is_single() ) ? '</div>' : '</a>' ; 
        }
    ?>
    <div class="text-holder">
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bakes_and_cakes_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="text">
		<?php 
			if( is_single() ){
                the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bakes-and-cakes' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) );
            }else{
                if( false === get_post_format() && !$ed_full_content  ){
                    the_excerpt();
                }else{
                    the_content( sprintf(
        				/* translators: %s: Name of current post. */
        				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bakes-and-cakes' ), array( 'span' => array( 'class' => array() ) ) ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );
                }
            }

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakes-and-cakes' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	
		
	    <footer class="entry-footer">
			<?php 
			if( !is_single()  && !$ed_full_content  ){ ?>
			   <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read More', 'bakes-and-cakes' ); ?></a>
			<?php
			}
			bakes_and_cakes_entry_footer();
			?> 
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
