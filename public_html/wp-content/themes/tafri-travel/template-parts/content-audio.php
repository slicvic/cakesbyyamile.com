<?php
/**
 * Template part for displaying posts
 */

?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

<div class="page-box">
  <div class="row">
    <div class="box-image">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
    </div>
    <div class="content">
      <h4><?php the_title();?></h4>        
      <p><?php $excerpt = get_the_excerpt();echo esc_html( tafri_travel_string_limit_words( $excerpt,30 ) ); ?></p>
      <p><?php the_tags(); ?></p> 
      <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?></span> 
      <div class="read-more-btn">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','tafri-travel'); ?></a>
      </div>
    </div>
  </div>
  <div class="metabox">
    <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'tafri-travel'), __('0 Comments', 'tafri-travel'), __('% Comments', 'tafri-travel') ); ?> </span>
    <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
  </div>
</div>