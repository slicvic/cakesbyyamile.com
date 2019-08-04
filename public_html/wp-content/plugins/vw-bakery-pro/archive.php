<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vw-bakery-pro
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php'; ?>
<div class="container">
	<div class="middle-align">
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
		</header>
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post();
							include(VW_BAKERY_PRO_EXT_DIR. 'template-parts/post/post-content.php');
						endwhile;
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'vw-bakery-pro' ),
							'next_text'          => __( 'Next page', 'vw-bakery-pro' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-bakery-pro' ) . ' </span>',
						));
					else :
						get_template_part( 'no-results', 'archive' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-4" id="<?php echo VW_BAKERY_STYLES; ?>sidebar">
				<?php  dynamic_sidebar('vw-sidebar-1'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php'; ?>