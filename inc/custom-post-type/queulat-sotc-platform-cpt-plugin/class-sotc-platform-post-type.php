<?php

use Queulat\Post_Type;

class Sotc_Platform_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'sotc_platform';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Platforms', 'cpt_sotc_platform'),
			'labels'                => [
				'name'                     => __('Platforms', 'cpt_sotc_platform'),
				'singular_name'            => __('Platforms', 'cpt_sotc_platform'),
				'add_new'                  => __('Add New', 'cpt_sotc_platform'),
				'add_new_item'             => __('Add New Page', 'cpt_sotc_platform'),
				'edit_item'                => __('Edit Page', 'cpt_sotc_platform'),
				'new_item'                 => __('New Page', 'cpt_sotc_platform'),
				'view_item'                => __('View Page', 'cpt_sotc_platform'),
				'view_items'               => __('View Pages', 'cpt_sotc_platform'),
				'search_items'             => __('Search Pages', 'cpt_sotc_platform'),
				'not_found'                => __('No pages found.', 'cpt_sotc_platform'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_sotc_platform'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_sotc_platform'),
				'all_items'                => __('Platforms', 'cpt_sotc_platform'),
				'archives'                 => __('Platforms', 'cpt_sotc_platform'),
				'attributes'               => __('Page Attributes', 'cpt_sotc_platform'),
				'insert_into_item'         => __('Insert into page', 'cpt_sotc_platform'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_sotc_platform'),
				'featured_image'           => __('Featured Image', 'cpt_sotc_platform'),
				'set_featured_image'       => __('Set featured image', 'cpt_sotc_platform'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_sotc_platform'),
				'use_featured_image'       => __('Use as featured image', 'cpt_sotc_platform'),
				'filter_items_list'        => __('Filter pages list', 'cpt_sotc_platform'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_sotc_platform'),
				'items_list'               => __('Pages list', 'cpt_sotc_platform'),
				'item_published'           => __('Page published.', 'cpt_sotc_platform'),
				'item_published_privately' => __('Page published privately.', 'cpt_sotc_platform'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_sotc_platform'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_sotc_platform'),
				'item_updated'             => __('Page updated.', 'cpt_sotc_platform'),
				'menu_name'                => __('Platforms', 'cpt_sotc_platform'),
				'name_admin_bar'           => __('Platforms', 'cpt_sotc_platform'),
			],
			'description'           => __('', 'cpt_sotc_platform'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-share',
			'capability_type'       => [
				0 => 'sotc_platform',
				1 => 'sotc_platforms',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => false,
			'query_var'             => 'sotc_platform',
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
