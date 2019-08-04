<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vw-bakery-pro
 */
?>
<header>
	<h3 class="entry-title"><?php _e( 'Nothing Found', 'vw-bakery-pro' ); ?></h3>
</header>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vw-bakery-pro' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-bakery-pro' ); ?></p><br />
		<?php include VW_BAKERY_PRO_EXT_DIR. 'searchform.php'; ?>
<?php else : ?>
	<p><?php _e( 'Don\'t worry &hellip; it happens to the best of us.', 'vw-bakery-pro' ); ?></p>
	<br />
	<div class="read-moresec">
		<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button hvr-sweep-to-right"><?php _e( 'Back to Home Page', 'vw-bakery-pro' ); ?></a></div>
	</div>
<?php endif; ?>