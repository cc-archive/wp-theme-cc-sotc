<?php

use Queulat\Post_Type;

class Sotc_Impact_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_impact';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Impact by numbers', 'cpt_sotc_impact'),
			'labels'                => [
				'name'                     => __('Impact by numbers', 'cpt_sotc_impact'),
				'singular_name'            => __('Impact by numbers', 'cpt_sotc_impact'),
				'add_new'                  => __('Add New', 'cpt_sotc_impact'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_impact'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_impact'),
				'new_item'                 => __('New Page', 'cpt_sotc_impact'),
				'view_item'                => __('View Page', 'cpt_sotc_impact'),
				'view_items'               => __('View Pages', 'cpt_sotc_impact'),
				'search_items'             => __('Search Pages', 'cpt_sotc_impact'),
				'not_found'                => __('No pages found.', 'cpt_sotc_impact'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_impact'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_impact'),
				'all_items'                => __('Impact by numbers', 'cpt_sotc_impact'),
				'archives'                 => __('Impact by numbers', 'cpt_sotc_impact'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_impact'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_impact'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_impact'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_impact'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_impact'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_impact'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_impact'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_impact'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_impact'),
				'items_list'               => __('Pages list', 'cpt_sotc_impact'),
				'item_published'           => __('Page published.', 'cpt_sotc_impact'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_impact'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_impact'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_impact'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_impact'),
				'menu_name'                => __('Impact by numbers', 'cpt_sotc_impact'),
				'name_admin_bar'           => __('Impact by numbers', 'cpt_sotc_impact'),
			],
			'description'           => __('', 'cpt_sotc_impact'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-visibility',
			'capability_type'       => [
				0 => 'sotc_impact',
				1 => 'sotc_impacts',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'sotc_impact',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => false,
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false
		];
	}
}
