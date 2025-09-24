<?php

namespace CEF\Tournaments;

/*
 * Plugin Name: Tournaments (Chess Education Foundation)
 * Description: Tools for displaying chess tournaments
 * Version: 1.0.0
 * Requires PHP: 7.4
 * Requires at least: 6.8.2
 * Author: Alex J. Gustafson Tech LLC for the Chess Education Foundation
 * Author URI: https://alexjgustafson.tech/
 */

defined('ABSPATH') or die();

// Composer Autoload
if(file_exists(__DIR__ . '/vendor/autoload.php')){
    require_once('vendor/autoload.php');
}

// Need this function before bundling ACF Pro
if (!function_exists( 'is_plugin_active')) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Require ACF Pro
$shouldIncludeACF = (!is_plugin_active( 'advanced-custom-fields-pro/acf.php' )) && (!defined( 'MY_ACF_PATH' ));
if ($shouldIncludeACF) {
    define( 'MY_ACF_PATH', __DIR__ . '/vendor/advanced-custom-fields-pro/' );
    define( 'MY_ACF_URL', plugin_dir_url( __FILE__ ) . '/vendor/advanced-custom-fields-pro/' );
    include_once( MY_ACF_PATH . 'acf.php' );
    add_filter('acf/settings/url', fn($x) => MY_ACF_URL);
}

// Include all files in /includes/
foreach (glob(__DIR__ . "/includes/*.php") as $filename) {
    include_once $filename;
}
