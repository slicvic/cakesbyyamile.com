<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cakecious
 */

get_header(); ?>

<?php do_action( 'tt_before_mainblock' ); ?>

<div class="mainblock" id="full-width-page-wrapper">

    <div  id="content" class="container">

	   <div class="row blog_inner">
		   <div id="primary" class="col-md-12 content-area">

	            <main id="main" class="site-main">

	                <?php while ( have_posts() ) : the_post(); ?>

	                    <?php get_template_part( 'templates/content', 'page' ); ?>

	                    <?php
	                        // If comments are open or we have at least one comment, load up the comment template
	                        if ( comments_open() || get_comments_number() ) :

	                            comments_template();

	                        endif;
	                    ?>

	                <?php endwhile; // end of the loop. ?>

	            </main><!-- #main -->

		    </div><!-- #primary -->
	    </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
