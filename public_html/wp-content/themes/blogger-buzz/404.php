<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blogger_buzz
 */

get_header();
?>
<div class="mp_corpo-blog">
    <div class="container">
    	<div class="row">

			<div id="primary" class="col-lg-12 col-md-12 col-sm-12 content-area">
				<main id="main" class="site-main">

					<section class="error-404 not-found text-center">
			
						<header class="page-header">
							<h1><?php esc_html_e('404','blogger-buzz'); ?></h1>
							<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blogger-buzz' ); ?></h2>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blogger-buzz' ); ?></p>							
						</div><!-- .page-content -->

						<div class="btns text-center">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn link btn_border btn_color_dark ">
								<span><?php esc_html_e('Back To Home','blogger-buzz'); ?></span>
							</a>
						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<?php get_footer();
