<?php
/**
 * The template for displaying all single posts.
 *
 * @package cakecious
 */

get_header(); ?>

<?php cakecious_hero_bg(); ?>

<!--================Blog Details Area =================-->
<div class="main_blog_area p_100 mainblock">
    <div class="container">
        <div class="row blog_inner">
            <div class="blog_lift_sidebar <?php if ( is_active_sidebar( 'default-sidebar' ) ) : ?> col-md-9 <?php else : ?>col-md-12<?php endif; ?>">
	                <main id="main" class="site-main main_blog_inner single_blog_inner">

	                    <?php while ( have_posts() ) : the_post(); ?>

	                        <?php get_template_part( 'templates/content', 'single' ); ?>

							<!-- Post nav -->
							<div class="clearfix mbottom20"></div>
							<?php if( function_exists('cakecious_tt_prev_post') ) echo cakecious_tt_prev_post(); ?>
							<?php if( function_exists('cakecious_tt_next_post') ) echo cakecious_tt_next_post(); ?>
							<div class="clearfix"></div>


	                        <?php
	                        // If comments are open or we have at least one comment, load up the comment template
	                        if ( comments_open() || get_comments_number() ) :
	                            comments_template();
	                        endif;
	                        ?>

	                    <?php endwhile; // end of the loop. ?>

	                </main><!-- #main -->
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>



