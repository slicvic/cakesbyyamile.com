<?php
/*
 * Template file for posts shortcode.
 * $temptt_t_vars is an array of custom parameters set for given post shortcode.
 */

?>

<div class="arivals_slider owl-carousel woocommerce">
			<?php
				// Posts are found
				if ( $posts->have_posts() ) {
					while ( $posts->have_posts() ) :
						$posts->the_post();
						global $post;global $product;


			// Fire standard shop loop hooks when paginating results so we can show result counts and so on.
				//do_action( 'woocommerce_before_shop_loop' );


?>
<div <?php wc_product_class('item'); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
    <div class="cake_feature_item">
	    <?php if( function_exists('woocommerce_show_product_loop_sale_flash')) woocommerce_show_product_loop_sale_flash(); ?>
		<div class="cake_img">
			<a href="<?php the_permalink(); ?>">
		     <?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( $post->ID, 'shop_single'  );
			} else {
				$html1  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html1 .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'cakecious' ) );
				$html1 .= '</div>';
			print wp_kses_post($html1); /* already sanitized. */
			}
		    ?>
			</a>
		</div>
		<div class="cake_text">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<h4><?php echo wp_kses_post($price_html); ?></h4>
			<?php endif; ?>
			<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
            <?php
            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="pest_btn %s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					esc_html( $product->add_to_cart_text() )
				),
			$product );
			?>
		</div>
	</div>
	<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 */
	?>
</div>

	    <?php
			//woocommerce_product_loop_end();

				do_action( 'woocommerce_after_shop_loop' );

					endwhile;
				}
				// Posts not found
				else {
					echo '<h4>' . esc_html__( 'Posts not found', 'cakecious' ) . '</h4>';
				}
			?>

</div>