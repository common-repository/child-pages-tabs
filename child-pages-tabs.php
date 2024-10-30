<?php
/**
 * Plugin Name: Child Pages Tabs
 * Description: Add all the child pages Title and Content in the tabs layout to the parent page usign shortcode.
 * Version: 1.0.0
 * Author:Rushi jagani
 * Author URI: https://rushijagani.wordpress.com/
 * Text Domain: child-pages-tabs
 *
 * @package Child Pages Tabs
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Set constants.
 */
define( 'CHILD_PAGES_TABS_FILE', __FILE__ );
define( 'CHILD_PAGES_TABS_BASE', plugin_basename( CHILD_PAGES_TABS_FILE ) );
define( 'CHILD_PAGES_TABS_DIR', plugin_dir_path( CHILD_PAGES_TABS_FILE ) );
define( 'CHILD_PAGES_TABS_URI', plugins_url( '/', CHILD_PAGES_TABS_FILE ) );
define( 'CHILD_PAGES_TABS_VER', '1.0.0' );

require_once CHILD_PAGES_TABS_DIR . 'classes/class-child-pages-tabs-shortcode.php';
