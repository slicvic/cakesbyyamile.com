<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


/**
 * Register Post Type and Taxonomies
 *
 * @since 1.0
 */
function tt_project_module_cpt() {

	$with_front = $project_cpt_slug = $project_cpt_cat_slug = $project_cpt_single = $single_args = '';

	if( function_exists( 'tt_temptt_get_option' ) ) {
		$with_front = tt_temptt_get_option( 'cpt_with_front', '0' );
		$project_cpt_slug = tt_temptt_get_option( 'project_cpt_slug', 'project-item' );
		$project_cpt_cat_slug = tt_temptt_get_option( 'project_cpt_cat_slug', 'project-cats' );
		$project_cpt_single = tt_temptt_get_option( 'project_cpt_single', true );
	}
	// With Front
	if ( ! empty ( $with_front )  ) $with_front = true; else $with_front = false;

	// Single page
	if ( ! empty ( $project_cpt_single )  ) { // single item true
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
			'name' => esc_attr__( 'Project', 'templatation' ),
			'singular_name' => esc_attr__( 'Project', 'templatation' ),
			'add_new' => esc_attr__( 'Add Project', 'templatation' ),
			'add_new_item' => esc_attr__( 'Add Project', 'templatation' ),
			'edit' => esc_attr__( 'Edit', 'templatation' ),
			'edit_item' => esc_attr__( 'Edit Project', 'templatation' ),
			'new_item' => esc_attr__( 'New Project', 'templatation' ),
			'view' => esc_attr__( 'View Project', 'templatation' ),
			'view_item' => esc_attr__( 'View Project', 'templatation' ),
			'search_items' => esc_attr__( 'Search Project', 'templatation' ),
			'not_found' => esc_attr__( 'No Project found', 'templatation' ),
			'not_found_in_trash' => esc_attr__( 'No Project found in Trash', 'templatation' ),
			'parent' => esc_attr__( 'Parent Project', 'templatation' ),
		),
		'public' => true,
		'rewrite' => array( 'slug' => $project_cpt_slug, 'with_front' => $with_front ),
		'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail', 'comments'  ),
	);

	// Single pages to be shown or not.
	$cpt_args = array_merge( $cpt_args, $single_args );

	// Apply filters
	$cpt_args = apply_filters( 'tt_project_cpt_args', $cpt_args );

	// Register Post Type
	register_post_type( 'tt_project', $cpt_args );

	/**
	 * Register Taxonomy ( Category )
	 */

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Project Categories', 'templatation' ),
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
			'slug' => $project_cpt_cat_slug,
			'with_front' => $with_front
		),
	);

	// Apply filters
	$tax_args = apply_filters( 'tt_project_cats_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'tt_project_cats', 'tt_project', $tax_args );

} add_action( 'init', 'tt_project_module_cpt' );