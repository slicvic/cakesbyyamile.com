<?php
/**
 * Template to show the content of Pet Sale section
 *
 * @package vw_bakery_pro
 */ 
$about_section = get_theme_mod( 'vw_bakery_pro_radio_products_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
if( get_theme_mod('vw_bakery_pro_products_bgcolor','') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_bakery_pro_products_bgcolor','')).';';
}elseif( get_theme_mod('vw_bakery_pro_products_bgimage','') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_bakery_pro_products_bgimage')).'\')';
}else{
  $about_backg = '';
}
?>
<section id="products" style="<?php echo esc_attr($about_backg); ?>">
  <div class="container">
    <?php if(get_theme_mod('vw_bakery_pro_products_title',true != '')){?>
      <div class="text-center">
        <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_products_title')); ?></h3>
      </div>
    <?php } ?> 
    <div class="text-center">
      <img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_products_title_image')); ?>" alt="Image"/>
    </div> 
    <?php if ( class_exists( 'WooCommerce' ) ) {?>
      <div class="products custom_items ml-0">
        <div class="owl-carousel">
          <?php
          $args = array( 
          'post_type' => 'product', 
          'posts_per_page' => get_theme_mod('vw_bakery_pro_products_number'),
          'product_cat' => get_theme_mod('vw_bakery_pro_productss_category')
          );
          $loop = new WP_Query( $args ); $i = 1;
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          <div class="<?php if($i == 1){ echo 'active';}?>"> 
            <div class="inner_product">               
              <div class="product-thumb">
                <div class="sale"><?php woocommerce_show_product_sale_flash( $post, $product ); ?></div>
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" alt="Placeholder" />'; ?>              
              </div>
              <div class="cart-btn button">
                <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
              </div>
              <div class="product-text">                
                <h5 class="product_head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p class="short_text pt-2"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_bakery_pro_string_limit_words($excerpt,12)); ?></p>
                <div class="custom-product-price">
                  <?php echo $product->get_price_html(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; ?>
          <?php wp_reset_query(); ?>
        </div>
      </div>
    <?php } else{ ?>
      <h3 class="text-center"><?php echo esc_html_e('Please install Woocommerce plugin and add your products to enable this section','vw-bakery-pro')?></h3>
    <?php }?>
  </div>
</section>