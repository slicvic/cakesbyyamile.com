<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package vw-bakery-pro
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php'; ?>
<div class="title-box">
	<div class="container">
		<h1><?php the_title();?></h1>	
	</div>
</div>
<div class="content_page">
	<div class="container">
		<div class="page-content">
				<h3><?php _e( '404 Not Found', 'vw-bakery-pro' ); ?></h3>
				<p class="text-404"><?php _e( 'Looks like you have taken a wrong turn &hellip; Don\'t worry &hellip; it happens to the best of us.', 'vw-bakery-pro' ); ?></p>  
				<div class="read-moresec">
					<div><a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right">
					<?php _e( 'Back to Home Page', 'vw-bakery-pro' ); ?></a></div>
					</div>			
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php'; ?>