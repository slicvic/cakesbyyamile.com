<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package vw-bakery-pro
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php'; ?>
<div class="container">
	<h1 class="entry-title"><?php printf( __( 'Results For: %s', 'vw-bakery-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</div>
<div class="container">
	<div class="middle-align">
		<div class="row">
			<div class="col-lg-8 col-sm-6 col-md-8">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post();
							include(VW_BAKERY_PRO_EXT_DIR. 'template-parts/post/post-content.php');
						endwhile; ?>
						<div class="navigation">
							<?php // Previous/next page navigation.
							  the_posts_pagination( array(
								  'prev_text'          => __( 'Previous page', 'vw-bakery-pro' ),
								  'next_text'          => __( 'Next page', 'vw-bakery-pro' ),
								  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-bakery-pro' ) . ' </span>',
							  )); ?>
						</div>
					<?php else : ?>
						<?php get_template_part( 'no-results', 'search' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6" id="<?php echo VW_BAKERY_STYLES; ?>sidebar">
				<?php dynamic_sidebar('vw-sidebar-1'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php'; ?>