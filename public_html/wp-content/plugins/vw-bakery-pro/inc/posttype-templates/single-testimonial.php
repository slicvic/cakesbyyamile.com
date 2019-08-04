<?php
/**
 * The Template for displaying all single team.
 *
 * @package vw-bakery-pro
 */
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_header.php';
require_once VW_BAKERY_PRO_PLUGIN_PATH.'/template-parts/banner.php';?>
<?php do_action('vw_bakery_pro_before_contact_title'); ?>
<div class="container">
    <div id="testimonial_single"> 
        <div class="row m-0"> 
            <div class="col-md-8">      
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="team_feature-box">
                                <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                            </div>
                        <?php } ?>
                    </div>  
                     <div class="col-lg-7 col-md-7">
                        <div class="testimonial_des">
                            <blockquote><?php the_content();?></blockquote>
                            <?php if(get_post_meta($post->ID,'vw_bakery_pro_posttype_testimonial_desigstory',true)!= ''){ ?>
                            <div class="teams-desig mb-3 mt-3"><?php echo esc_html(get_post_meta($post->ID,'vw_bakery_pro_posttype_testimonial_desigstory',true)); ?></div>
                            <?php }?>
                        </div>
                    </div>
                </div>         
                <?php endwhile; // end of the loop. ?>
                <div class="post_pagination mt-4">
                    <?php the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-bakery-pro' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'vw-bakery-pro' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-bakery-pro' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-bakery-pro' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );?>
                </div>
            </div>
            <div class="col-md-4" id="<?php echo VW_BAKERY_STYLES; ?>sidebar">
                  <?php dynamic_sidebar('vw-sidebar-1'); ?>
            </div>
        </div>
    </div>
</div>
<?php require_once VW_BAKERY_PRO_PLUGIN_PATH.'/vw_footer.php';?>