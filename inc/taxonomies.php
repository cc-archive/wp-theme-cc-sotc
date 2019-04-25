<?php
// Register Custom Taxonomy
function tax_register_sotc_year() {

	$labels = array(
		'name'                       => _x( 'Years', 'Taxonomy General Name', 'cc-sotc' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'cc-sotc' ),
		'menu_name'                  => __( 'Year', 'cc-sotc' ),
		'all_items'                  => __( 'All Years', 'cc-sotc' ),
		'parent_item'                => __( 'Parent Year', 'cc-sotc' ),
		'parent_item_colon'          => __( 'Parent year:', 'cc-sotc' ),
		'new_item_name'              => __( 'New Year Name', 'cc-sotc' ),
		'add_new_item'               => __( 'Add New Year', 'cc-sotc' ),
		'edit_item'                  => __( 'Edit Year', 'cc-sotc' ),
		'update_item'                => __( 'Update year', 'cc-sotc' ),
		'view_item'                  => __( 'View year', 'cc-sotc' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cc-sotc' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cc-sotc' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cc-sotc' ),
		'popular_items'              => __( 'Popular Items', 'cc-sotc' ),
		'search_items'               => __( 'Search Items', 'cc-sotc' ),
		'not_found'                  => __( 'Not Found', 'cc-sotc' ),
		'no_terms'                   => __( 'No items', 'cc-sotc' ),
		'items_list'                 => __( 'Items list', 'cc-sotc' ),
		'items_list_navigation'      => __( 'Items list navigation', 'cc-sotc' ),
	);
	$rewrite = array(
		'slug'                       => 'year-report',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'sotc_year', array( 'post', 'sotc_financial', 'sotc_highlight', 'sotc_highlight', 'sotc_impact', 'sotc_license', 'sotc_platform' ), $args );

}
add_action( 'init', 'tax_register_sotc_year', 0 );
