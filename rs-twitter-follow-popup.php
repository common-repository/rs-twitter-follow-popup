<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/rosinghal
 * @since             1.0.0
 * @package           Rs_Twitter_Follow_Popup
 *
 * @wordpress-plugin
 * Plugin Name:       RS Twitter Follow Popup
 * Plugin URI:        https://wordpress.org/plugins/rs-twitter-follow-popup/
 * Description:       Increase your twitter followers with this simple Wordpress plugin.
 * Version:           1.0.0
 * Author:            Rohit Singhal
 * Author URI:        https://profiles.wordpress.org/rosinghal
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rs-twitter-follow-popup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rs-twitter-follow-popup-activator.php
 */
function activate_rs_twitter_follow_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rs-twitter-follow-popup-activator.php';
	Rs_Twitter_Follow_Popup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rs-twitter-follow-popup-deactivator.php
 */
function deactivate_rs_twitter_follow_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rs-twitter-follow-popup-deactivator.php';
	Rs_Twitter_Follow_Popup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rs_twitter_follow_popup' );
register_deactivation_hook( __FILE__, 'deactivate_rs_twitter_follow_popup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rs-twitter-follow-popup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rs_twitter_follow_popup() {

	$plugin = new Rs_Twitter_Follow_Popup();
	$plugin->run();

}
run_rs_twitter_follow_popup();
