<?php

use Queulat\Post_Type;

class Sotc_Highlight_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_highlight';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Highlights', 'cpt_sotc_highlight'),
			'labels'                => [
				'name'                     => __('Highlights', 'cpt_sotc_highlight'),
				'singular_name'            => __('Highlights', 'cpt_sotc_highlight'),
				'add_new'                  => __('Add New', 'cpt_sotc_highlight'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_highlight'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_highlight'),
				'new_item'                 => __('New Page', 'cpt_sotc_highlight'),
				'view_item'                => __('View Page', 'cpt_sotc_highlight'),
				'view_items'               => __('View Pages', 'cpt_sotc_highlight'),
				'search_items'             => __('Search Pages', 'cpt_sotc_highlight'),
				'not_found'                => __('No pages found.', 'cpt_sotc_highlight'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_highlight'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_highlight'),
				'all_items'                => __('Highlights', 'cpt_sotc_highlight'),
				'archives'                 => __('Highlights', 'cpt_sotc_highlight'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_highlight'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_highlight'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_highlight'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_highlight'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_highlight'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_highlight'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_highlight'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_highlight'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_highlight'),
				'items_list'               => __('Pages list', 'cpt_sotc_highlight'),
				'item_published'           => __('Page published.', 'cpt_sotc_highlight'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_highlight'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_highlight'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_highlight'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_highlight'),
				'menu_name'                => __('Highlights', 'cpt_sotc_highlight'),
				'name_admin_bar'           => __('Highlights', 'cpt_sotc_highlight'),
			],
			'description'           => __('', 'cpt_sotc_highlight'),
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
				0 => 'sotc_highlight',
				1 => 'sotc_highlights',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'sotc_highlight',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => false,
			'supports'              => [
				0 => 'title',
				1 => 'editor',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false
		];
	}
}
