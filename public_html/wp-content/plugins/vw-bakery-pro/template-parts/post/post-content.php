<div class="col-lg-6 col-md-6 col-sm-12">
  <div id="latest_post">
    <div class="postbox">
        <?php if (has_post_thumbnail()){ ?>
          <div class="postpic">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?> 
        <div class="postbox-content postcol<?php echo esc_attr($i); ?>">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php $excerpt = get_the_excerpt(); echo esc_html(vw_bakery_pro_string_limit_words($excerpt,25)); ?></p>
          <div class="read-more">
            <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE','vw-bakery-pro' ); ?></a>
          </div>
        </div>
    </div>
  </div>
</div>