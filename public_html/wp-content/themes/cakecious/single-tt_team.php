<?php
/**
 * The template for displaying all single event.
 *
 * @package cakecious
 */

get_header();

//fetching meta data
$data = get_post_meta( get_the_ID(), '_tt_meta_page_opt', true );

?>

<?php do_action( 'tt_before_mainblock' ); ?>

<section class="event_details_area">
    <div class="container">
        <div class="row event_details_row">
            <div class="col-lg-9">
                <div class="details_left_sidebar">
                    <?php the_post_thumbnail( $post->ID, array('870', '370') ); ?>
                    <div class="event_details">
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
               <div class="details_right_sidebar">
                    <h4 class="p-0"><?php print wp_kses_post($data['_ht_event_time_label']); ?></h4>
                    <h6><?php print wp_kses_post(nl2br($data['_ht_event_time'])); ?></h6>
                    <h4><?php print wp_kses_post(nl2br($data['_ht_event_loc_label'])); ?></h4>
                    <address>
                        <?php print wp_kses_post(nl2br($data['_ht_event_loc'])); ?>
                    </address>
                    <h4><?php print wp_kses_post($data['_ht_event_schedule_label']); ?></h4>
                    <?php
                    $list = explode("#", $data['_ht_event_schedule']);
					echo "<ul class='hourly_schedule'>";
                    foreach ($list as &$lists) {
					    echo "<li>".wp_kses_post($lists).'</li>';
					}
					echo "</ul>";
                    ?>
               </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
