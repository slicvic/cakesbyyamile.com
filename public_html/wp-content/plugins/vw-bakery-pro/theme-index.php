<?php
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php';
?>
 <div class="post-section mt-5">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-8 col-sm-6 col-md-8">
 				<?php while ( have_posts() ) : the_post();
 					include(VW_BAKERY_PRO_EXT_DIR. 'template-parts/post/post-content.php');
 				endwhile; ?>
 			  <div class="navigation pagination">
 				<?php // Previous/next page navigation.
 				  the_posts_pagination( array(
 					  'prev_text'          => __( 'Previous page', 'vw-bakery-pro' ),
 					  'next_text'          => __( 'Next page', 'vw-bakery-pro' ),
 					  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-bakery-pro' ) . ' </span>',
 				  )); ?>
 			  </div>
 			</div>
 			<div class="col-lg-4 col-md-4 col-sm-12" id="<?php echo VW_BAKERY_STYLES; ?>sidebar">
 				<?php dynamic_sidebar('vw-sidebar-1'); ?>
 			</div>
 		</div>
 	</div>
 </div>

<?php
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php';
 ?>
