<?php
/**
 * @package cakecious
 */

get_header(); ?>

<?php do_action( 'tt_before_mainblock' ); ?>

<?php
$enable_prod_sidebar = '0';
if(is_active_sidebar( 'shop' ) ) $show_sidebar = '1';
if ( is_product() && $show_sidebar ) {
	$enable_prod_sidebar = cakecious_fw_get_option('enable_prod_sidebar', '0');
	if( ! $enable_prod_sidebar ) $show_sidebar = '0';
}
?>
<div class="mainblock product_area" id="full-width-page-wrapper">

    <div id="content" class="container">

	   <div class="row product_inner_row">

		   <div id="primary" class="<?php if ( $show_sidebar ) : ?>col-lg-9<?php else : ?>col-lg-12<?php endif; ?> content-area">

	            <main id="main" class="site-main">

	            <!-- The WooCommerce loop -->
                <?php woocommerce_content(); ?>

	            </main><!-- #main -->

		   </div><!-- #primary -->

			<?php if ( $show_sidebar ) get_sidebar('shop'); ?>

	    </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
