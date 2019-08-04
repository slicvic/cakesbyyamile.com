<?php 
$attorneys_enable = get_theme_mod( 'vw_bakery_pro_radio_testimonial_enable' );
if ( 'Disable' == $attorneys_enable ) {
  return;
}
$args = array(
  'post_type' => 'testimonials',
  'post_status' => 'publish'
);
$new = new WP_Query($args);
?>
<section id="testimonials">
  <div class="container">
    <?php if(get_theme_mod('vw_bakery_pro_testimonial_title') != ''){?>
      <div class="text-center">
        <h3><?php echo esc_html(get_theme_mod('vw_bakery_pro_testimonial_title')); ?></h3>
      </div>
    <?php }?>
    <div class="text-center">
      <img class="mt-3 mb-4" src="<?php echo esc_url(get_theme_mod('vw_bakery_pro_testimonial_title_image')); ?>" alt=" Image"/>
    </div>
    <?php
      if ( $new->have_posts() ) : ?>
      <div class="owl-carousel">
        <?php
          $i=1;
          while ( $new->have_posts() ){
            $new->the_post();  ?>
            <div class="<?php if($i == 1){ echo 'active';}?>"> 
              <ul>
                <li>
                  <?php if (has_post_thumbnail()){ ?>
                    <img src="<?php the_post_thumbnail_url(); ?>">
                  <?php } ?>
                </li>
                <li>
                  <h4 class="testimonial_name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <cite><?php echo esc_html(get_post_meta($post->ID,'vw_bakery_pro_posttype_testimonial_desigstory',true)); ?></cite></h4>
                </li>
              </ul>
              <div class="testimonial_box" >
                <p><?php $excerpt = get_the_excerpt(); echo esc_html(vw_bakery_pro_string_limit_words($excerpt,25)); ?></p>    
              </div>                
            </div>
            <?php $i++;
          }
          wp_reset_query(); ?>
      </div>
    <?php 
      else :
        echo '<h5 class="text-center">' . esc_html__( 'Create the testimonials to make it appear here.', 'vw-bakery-pro' ) . '</h5>';
      endif;
    ?>
  </div>
</section>