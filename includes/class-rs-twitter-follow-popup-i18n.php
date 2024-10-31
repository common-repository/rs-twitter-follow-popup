<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://profiles.wordpress.org/rosinghal
 * @since      1.0.0
 *
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/includes
 * @author     Rohit Singhal <rohitsinghal.rs@gmail.com>
 */
class Rs_Twitter_Follow_Popup_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rs-twitter-follow-popup',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
