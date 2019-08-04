<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package vw-bakery-pro
 */
?>
<div id="<?php echo VW_BAKERY_STYLES; ?>sidebar">
	<?php if ( ! dynamic_sidebar( 'vw-sidebar-1' ) ) : ?>
		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'vw-bakery-pro' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>
		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'vw-bakery-pro' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
</div>