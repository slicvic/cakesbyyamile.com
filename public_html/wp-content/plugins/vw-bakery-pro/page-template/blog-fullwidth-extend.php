<?php
/**
 * Template Name:Blog Full Width Extend
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/template-parts/banner.php'; ?>

<?php do_action('vw_bakery_pro_before_blog'); ?>

<div id="full-width-blog">
	<div class="container">
    	<div class="content_page row m-0">
			<?php if ( have_posts() ) : ?>
		      	<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args = array(
					   'paged' => $paged,
					   'category_name' => get_theme_mod('vw_bakery_pro_category_setting')
					);
					$custom_query = new WP_Query( $args );?>
					<div class="">
						<div class="row">
							<?php while($custom_query->have_posts()) :
							   $custom_query->the_post();?>
							   	<?php include(VW_BAKERY_PRO_EXT_DIR. 'template-parts/post/post-content.php'); ?>
							<?php $p++; endwhile;
							wp_reset_postdata(); ?>
						</div>
					</div>
					<div class="navigation">
						<?php 
							$big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => 'paged=%#%',
								'current' =>  (get_query_var('paged') ? get_query_var('paged') : 1),
								'total' => $custom_query->max_num_pages
							) );
						?>
					</div>
			<?php else : ?>
				<h3><?php esc_html_e('Not Found','vw-bakery-pro'); ?></h3>
			<?php endif; ?>
        	<div class="clearfix"></div>
		</div>
	</div>
</div>

<?php do_action('vw_bakery_pro_after_blog'); ?>

<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php';?>