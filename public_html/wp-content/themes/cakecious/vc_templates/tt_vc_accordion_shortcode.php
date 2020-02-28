<?php
/**
 * @package cakecious
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract($atts);

?>

<div id="accordion">
	<?php print do_shortcode($content); ?>
</div>

