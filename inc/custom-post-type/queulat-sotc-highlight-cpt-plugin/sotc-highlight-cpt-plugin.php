<?php
/**
 * Plugin Name: Highlights Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function register_post_type_highlight() {
	require_once __DIR__ .'/class-sotc-highlight-post-type.php';
	Sotc_Highlight_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-highlight-post-type.php';
	require_once __DIR__ .'/class-sotc-highlight-post-query.php';
	require_once __DIR__ .'/class-sotc-highlight-post-object.php';
}

add_action('init', 'register_post_type_highlight');
