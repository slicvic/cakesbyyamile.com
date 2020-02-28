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

<div class=" mainblock" id="full-width-page-wrapper">

    <div  id="content" class="container">

	   <div class="row">
		   <div id="primary" class="col-md-12 content-area">

	            <main id="main" class="site-main">

	                <?php while ( have_posts() ) : the_post(); ?>

	                    <?php get_template_part( 'templates/content', 'project' ); ?>

	                <?php endwhile; // end of the loop. ?>

	            </main><!-- #main -->

		    </div><!-- #primary -->
	    </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
