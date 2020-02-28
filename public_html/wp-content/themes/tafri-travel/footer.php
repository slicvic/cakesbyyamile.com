<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tafri-travel
 */
?>
    <div id="footer" class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-1');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <span><?php tafri_travel_credit(); ?> <?php echo esc_html(get_theme_mod('tafri_travel_footer_text',__('By ThemesEye','tafri-travel'))); ?> </span>
            <span class="footer_text"><?php echo esc_html_e('Powered By WordPress','tafri-travel') ?></span>
        </div>
    </div>
    <?php wp_footer();?>
    </body>
</html>