<?php
/**
 * Plugin Name: Reports Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function register_post_type_report() {
	require_once __DIR__ .'/class-sotc-report-post-type.php';
	Sotc_Report_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-report-post-type.php';
	require_once __DIR__ .'/class-sotc-report-post-query.php';
	require_once __DIR__ .'/class-sotc-report-post-object.php';
	require_once __DIR__ .'/class-sotc-report-metabox.php';
}

add_action('init', 'register_post_type_report');
