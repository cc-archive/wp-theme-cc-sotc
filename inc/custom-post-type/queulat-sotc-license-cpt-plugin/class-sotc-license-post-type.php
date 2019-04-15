<?php

use Queulat\Post_Type;

class Sotc_License_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_license';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Licenses', 'cpt_sotc_license'),
			'labels'                => [
				'name'                     => __('Licenses', 'cpt_sotc_license'),
				'singular_name'            => __('Licenses', 'cpt_sotc_license'),
				'add_new'                  => __('Add New', 'cpt_sotc_license'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_license'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_license'),
				'new_item'                 => __('New Page', 'cpt_sotc_license'),
				'view_item'                => __('View Page', 'cpt_sotc_license'),
				'view_items'               => __('View Pages', 'cpt_sotc_license'),
				'search_items'             => __('Search Pages', 'cpt_sotc_license'),
				'not_found'                => __('No pages found.', 'cpt_sotc_license'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_license'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_license'),
				'all_items'                => __('Licenses', 'cpt_sotc_license'),
				'archives'                 => __('Licenses', 'cpt_sotc_license'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_license'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_license'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_license'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_license'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_license'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_license'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_license'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_license'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_license'),
				'items_list'               => __('Pages list', 'cpt_sotc_license'),
				'item_published'           => __('Page published.', 'cpt_sotc_license'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_license'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_license'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_license'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_license'),
				'menu_name'                => __('Licenses', 'cpt_sotc_license'),
				'name_admin_bar'           => __('Licenses', 'cpt_sotc_license'),
			],
			'description'           => __('', 'cpt_sotc_license'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-unlock',
			'capability_type'       => [
				0 => 'sotc_license',
				1 => 'sotc_licenses',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'sotc_license',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => false,
			'supports'              => [
				0 => 'title',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false
		];
	}
}
