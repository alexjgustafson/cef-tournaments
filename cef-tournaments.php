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
