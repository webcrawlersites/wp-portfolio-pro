<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://webcrawlersites.com
 * @since             1.0.0
 * @package           Wp_Portfolio_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       WP Portfolio Pro
 * Plugin URI:        https://webcrawlersites.com/wp-portfolio-pro
 * Description:       A lightweight, easy, and modern designed portfolio plugin offering multiple layouts.
 * Version:           1.0.0
 * Author:            Web Crawler Sites
 * Author URI:        https://webcrawlersites.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-portfolio-pro
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_PORTFOLIO_PRO_VERSION', '1.0.0' );

/**
 * Path to the plugin directory
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'WPPPRO_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Creates portfolio custom post type
 */
require WPPPRO_PATH . 'inc/wp-portfolio-pro-cpt.php';

/**
 * Creates the shortcode with the attributes
 */
require WPPPRO_PATH . 'inc/wp-portfolio-pro-shortcode.php';

/**
 * Enqueue CSS styles ofr the portfolio layout
 */
function wpppro_styles() {
    wp_enqueue_style( 'wpppro-styles', plugins_url( 'assets/css/styles.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'wpppro_styles' );