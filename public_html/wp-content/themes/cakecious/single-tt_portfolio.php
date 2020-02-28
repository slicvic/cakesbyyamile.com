<?php

get_header(); ?>

<?php do_action( 'tt_before_mainblock' ); ?>

<div class="blog_area blog_details mainblock" id="full-width-page-wrapper">

    <div  id="content" class="container">

	   <div class="row blog_inner">
		   <div id="primary" class="col-md-12 content-area">

	            <main id="main" class="site-main">

	                <?php while ( have_posts() ) : the_post(); ?>

	                    <?php get_template_part( 'templates/content', 'page' ); ?>

	                <?php endwhile; // end of the loop. ?>

	            </main><!-- #main -->

		    </div><!-- #primary -->
	    </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
