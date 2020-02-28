<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package cakecious
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="input-group">
			<input type="hidden" name="post_type" value="post">
			<input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'cakecious' ); ?>" />
			<span class="input-group-btn">
				<input type="submit" class="submit btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'cakecious' ); ?>" />
			</span>

		</div>
	</form>
