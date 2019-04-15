<?php

use Queulat\Post_Type;

class Sotc_Financial_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_financial';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Financials', 'cpt_sotc_financial'),
			'labels'                => [
				'name'                     => __('Financials', 'cpt_sotc_financial'),
				'singular_name'            => __('Financials', 'cpt_sotc_financial'),
				'add_new'                  => __('Add New', 'cpt_sotc_financial'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_financial'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_financial'),
				'new_item'                 => __('New Page', 'cpt_sotc_financial'),
				'view_item'                => __('View Page', 'cpt_sotc_financial'),
				'view_items'               => __('View Pages', 'cpt_sotc_financial'),
				'search_items'             => __('Search Pages', 'cpt_sotc_financial'),
				'not_found'                => __('No pages found.', 'cpt_sotc_financial'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_financial'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_financial'),
				'all_items'                => __('Financials', 'cpt_sotc_financial'),
				'archives'                 => __('Financials', 'cpt_sotc_financial'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_financial'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_financial'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_financial'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_financial'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_financial'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_financial'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_financial'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_financial'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_financial'),
				'items_list'               => __('Pages list', 'cpt_sotc_financial'),
				'item_published'           => __('Page published.', 'cpt_sotc_financial'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_financial'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_financial'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_financial'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_financial'),
				'menu_name'                => __('Financials', 'cpt_sotc_financial'),
				'name_admin_bar'           => __('Financials', 'cpt_sotc_financial'),
			],
			'description'           => __('', 'cpt_sotc_financial'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-chart-pie',
			'capability_type'       => [
				0 => 'sotc_financial',
				1 => 'sotc_financials',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'sotc_financial',
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
