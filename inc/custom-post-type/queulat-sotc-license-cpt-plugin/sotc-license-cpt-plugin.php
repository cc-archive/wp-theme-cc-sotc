<?php
/**
 * Plugin Name: Licenses Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function register_post_type_license() {
	require_once __DIR__ .'/class-sotc-license-post-type.php';
	Sotc_License_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-license-post-type.php';
	require_once __DIR__ .'/class-sotc-license-post-query.php';
	require_once __DIR__ .'/class-sotc-license-post-object.php';
	require_once __DIR__ .'/class-sotc-license-metabox.php';
}

add_action('init', 'register_post_type_license');
