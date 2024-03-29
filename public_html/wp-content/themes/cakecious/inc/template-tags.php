<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cakecious
 */

if ( ! function_exists( 'cakecious_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cakecious_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">' . esc_html__( ' Edited %4$s', 'cakecious' ) . '</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'cakecious' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	/* building comment */
	$comment = '';
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		ob_start(); ?>
		<span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i>
		 <?php comments_popup_link( esc_html__( '0 comment', 'cakecious' ), esc_html__( '1 Comment', 'cakecious' ), esc_html__( '% Comments', 'cakecious' ) ); ?>
		</span>
<?php
		$comment = ob_get_clean();
	}

	echo '
            <div class="posted-icon">
                <div class="profile-image-small">'. get_avatar( get_the_author_meta( 'ID' ), '32' ) .'</div>
            </div>
			<span class="byline"><i class="fa fa-user" aria-hidden="true"></i> ' . $byline . '</span>
			<span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i>' . $posted_on . '</span>
			'.$comment
		 ;

}
endif;

if ( ! function_exists( 'cakecious_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cakecious_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'cakecious' ) );
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cakecious' ) . '</span>', $categories_list );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'cakecious' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cakecious' ) . '</span>', $tags_list );
		}
	}
/*		edit_post_link(
		sprintf(
			esc_html__( 'Edit %s', 'cakecious' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);*/
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cakecious_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'cakecious_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'cakecious_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so cakecious_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cakecious_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cakecious_categorized_blog.
 */
function cakecious_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cakecious_categories' );
}
add_action( 'edit_category', 'cakecious_category_transient_flusher' );
add_action( 'save_post',     'cakecious_category_transient_flusher' );
