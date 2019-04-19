<?php
/**
 * Plugin Name: Platforms Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */
function register_post_type_plarforms() {
	require_once __DIR__ .'/class-sotc-platform-post-type.php';
	Sotc_Platform_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-platform-post-type.php';
	require_once __DIR__ .'/class-sotc-platform-post-query.php';
	require_once __DIR__ .'/class-sotc-platform-post-object.php';
	require_once __DIR__ .'/class-sotc-platform-metabox.php';
}

add_action('init','register_post_type_plarforms');
