<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


/**
 * Register Post Type and Taxonomies
 *
 * @since 1.0
 */
function tt_car_module_cpt() {

	$with_front = $car_cpt_slug = $car_cpt_cat_slug = $car_cpt_single = $single_args = '';

	if( function_exists( 'tt_temptt_get_option' ) ) {
		$with_front = tt_temptt_get_option( 'cpt_with_front', '0' );
		$car_cpt_slug = tt_temptt_get_option( 'car_cpt_slug', 'car-item' );
		$car_cpt_cat_slug = tt_temptt_get_option( 'car_cpt_cat_slug', 'car-cats' );
		$car_cpt_single = tt_temptt_get_option( 'car_cpt_single', true );
	}
	// With Front
	if ( ! empty ( $with_front )  ) $with_front = true; else $with_front = false;

	// Single page
	if ( ! empty ( $car_cpt_single )  ) { // single item true
		$single_args =  array('show_ui' => true) ;
	} else {
		$single_args =  array(
						'exclude_from_search' => true,
						'show_in_admin_bar'   => false,
						'show_in_nav_menus'   => false,
						'publicly_queryable'  => false,
						'query_var'           => false,
		) ;
	}


	/**
	 * Register Post Type
	 */

	// Arguments
	$cpt_args = array(
		'labels' => array(
			'name' => esc_attr__( 'car', 'templatation' ),
			'singular_name' => esc_attr__( 'car', 'templatation' ),
			'add_new' => esc_attr__( 'Add car', 'templatation' ),
			'add_new_item' => esc_attr__( 'Add car', 'templatation' ),
			'edit' => esc_attr__( 'Edit', 'templatation' ),
			'edit_item' => esc_attr__( 'Edit car', 'templatation' ),
			'new_item' => esc_attr__( 'New car', 'templatation' ),
			'view' => esc_attr__( 'View car', 'templatation' ),
			'view_item' => esc_attr__( 'View car', 'templatation' ),
			'search_items' => esc_attr__( 'Search car', 'templatation' ),
			'not_found' => esc_attr__( 'No car found', 'templatation' ),
			'not_found_in_trash' => esc_attr__( 'No car found in Trash', 'templatation' ),
			'parent' => esc_attr__( 'Parent car', 'templatation' ),
		),
		'public' => true,
		'rewrite' => array( 'slug' => $car_cpt_slug, 'with_front' => $with_front ),
		'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail', 'comments'  ),
	);

	// Single pages to be shown or not.
	$cpt_args = array_merge( $cpt_args, $single_args );

	// Apply filters
	$cpt_args = apply_filters( 'tt_car_cpt_args', $cpt_args );

	// Register Post Type
	register_post_type( 'car', $cpt_args );

	/**
	 * Register Taxonomy ( Category )
	 */

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Car Categories', 'templatation' ),
			'singular_name' => esc_attr__( 'Category', 'templatation' ),
			'search_items'  => esc_attr__( 'Search Categories', 'templatation' ),
			'all_items' => esc_attr__( 'All Categories', 'templatation' ),
			'parent_item' => esc_attr__( 'Parent Category', 'templatation' ),
			'parent_item_colon' => esc_attr__( 'Parent Category:', 'templatation' ),
			'edit_item' => esc_attr__( 'Edit Category', 'templatation' ),
			'update_item' => esc_attr__( 'Update Category', 'templatation' ),
			'add_new_item' => esc_attr__( 'Add New Category', 'templatation' ),
			'new_item_name' => esc_attr__( 'New Category Name', 'templatation' ),
			'menu_name' => esc_attr__( 'Categories', 'templatation' ),
		),
		'hierarchical' => true,
		'public' => true,
		'rewrite' => array(
			'slug' => $car_cpt_cat_slug,
			'with_front' => $with_front
		),
	);

	// Apply filters
	$tax_args = apply_filters( 'tt_car_cats_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'tt_car_cats', 'car', $tax_args );

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Location', 'templatation' ),
			'singular_name' => esc_attr__( 'Location', 'templatation' ),
			'search_items'  => esc_attr__( 'Search Location', 'templatation' ),
			'all_items' => esc_attr__( 'All Location', 'templatation' ),
			'parent_item' => esc_attr__( 'Parent Location', 'templatation' ),
			'parent_item_colon' => esc_attr__( 'Parent Location:', 'templatation' ),
			'edit_item' => esc_attr__( 'Edit Location', 'templatation' ),
			'update_item' => esc_attr__( 'Update Location', 'templatation' ),
			'add_new_item' => esc_attr__( 'Add New Location', 'templatation' ),
			'new_item_name' => esc_attr__( 'New Location Name', 'templatation' ),
			'menu_name' => esc_attr__( 'Location', 'templatation' ),
		),
		'hierarchical' => true,
		'public' => true,
		'rewrite' => array(
			'slug' => $car_cpt_cat_slug,
			'with_front' => $with_front
		),
	);

	// Apply filters
	$tax_args = apply_filters( 'tt_car_loc_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'location', 'car', $tax_args );

} add_action( 'init', 'tt_car_module_cpt' );