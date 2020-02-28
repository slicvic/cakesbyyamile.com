<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package cakecious
 */

if ( ! is_active_sidebar( 'default-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="col-lg-3" role="complementary">
	<div class="right_sidebar_area">
		<?php dynamic_sidebar( 'default-sidebar' ); ?>
	</div>
</div><!-- #secondary -->
