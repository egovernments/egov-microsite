<?php
/**
 * WPPM Classic Widgets
 *
 * Plugin Name: WPPM Classic Widgets
 * Plugin URI:  https://wordpress.org/plugins/wppm-classic-widgets
 * Description: Disable the latest gutenberg block editor widget Editor and restore the previous classic widgets settings screens in Appearance.
 * Version:    1.1
 * Author:      Pradeep Maurya
 * Author URI:  https://pradeepmaurya.in/website-designer-in-delhi-india/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: wppm-classic-widgets
 * Domain Path: /languages
 * Requires at least: 4.9
 * Requires PHP: 5.6 or later
 * * Copyright: (c) 2021-2022 Codevyne Creatives PVT LTD.
 */

if ( ! defined( 'ABSPATH' ) ) {
	 die('-1');
}

if (!defined('WPPMCW_PLUGIN_NAME')) {
  define('WPPMCW_PLUGIN_NAME', 'WP Classic Widgets');
}
if (!defined('WPPMCW_PLUGIN_VERSION')) {
  define('WPPMCW_PLUGIN_VERSION', '1.1');
}
if (!defined('WPPMCW_PLUGIN_FILE')) {
  define('WPPMCW_PLUGIN_FILE', __FILE__);
}
if (!defined('WPPMCW_PLUGIN_DIR')) {
  define('WPPMCW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('WPPMCW_BASE_NAME')) {
    define('WPPMCW_BASE_NAME', plugin_basename(WPPMCW_PLUGIN_FILE));
}
if (!defined('WPPMCW_DOMAIN')) {
  define('WPPMCW_DOMAIN', 'wppmcw');
}


if (!class_exists('WPPMCW')) {

    class WPPMCW {

        protected static $WPPMCW_instance;
        function __construct() {
           
        }


        function init() {
        // Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
          
        }


        public static function WPPMCW_instance() {
            if (!isset(self::$WPPMCW_instance)) {
                self::$WPPMCW_instance = new self();
                self::$WPPMCW_instance->init();
            }
            return self::$WPPMCW_instance;
        }

    }

    add_action('plugins_loaded', array('WPPMCW', 'WPPMCW_instance'));
}

