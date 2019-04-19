<?php
/**
 * Plugin Name: Financials Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function register_post_type_financial() {
	require_once __DIR__ .'/class-sotc-financial-post-type.php';
	Sotc_Financial_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-financial-post-type.php';
	require_once __DIR__ .'/class-sotc-financial-post-query.php';
	require_once __DIR__ .'/class-sotc-financial-post-object.php';
	require_once __DIR__ .'/class-sotc-financial-metabox.php';
}

add_action('init', 'register_post_type_financial');
