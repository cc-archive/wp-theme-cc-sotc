<?php

use Queulat\Post_Type;

class Sotc_Report_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_report';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Reports', 'cpt_sotc_report'),
			'labels'                => [
				'name'                     => __('Reports', 'cpt_sotc_report'),
				'singular_name'            => __('Reports', 'cpt_sotc_report'),
				'add_new'                  => __('Add New', 'cpt_sotc_report'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_report'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_report'),
				'new_item'                 => __('New Page', 'cpt_sotc_report'),
				'view_item'                => __('View Page', 'cpt_sotc_report'),
				'view_items'               => __('View Pages', 'cpt_sotc_report'),
				'search_items'             => __('Search Pages', 'cpt_sotc_report'),
				'not_found'                => __('No pages found.', 'cpt_sotc_report'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_report'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_report'),
				'all_items'                => __('Reports', 'cpt_sotc_report'),
				'archives'                 => __('Reports', 'cpt_sotc_report'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_report'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_report'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_report'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_report'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_report'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_report'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_report'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_report'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_report'),
				'items_list'               => __('Pages list', 'cpt_sotc_report'),
				'item_published'           => __('Page published.', 'cpt_sotc_report'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_report'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_report'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_report'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_report'),
				'menu_name'                => __('Reports', 'cpt_sotc_report'),
				'name_admin_bar'           => __('Reports', 'cpt_sotc_report'),
			],
			'description'           => __('', 'cpt_sotc_report'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-clipboard',
			'capability_type'       => [
				0 => 'sotc_report',
				1 => 'sotc_reports',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'sotc_report',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'sotc_report',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false
		];
	}
}
