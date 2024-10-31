<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/rosinghal
 * @since      1.0.0
 *
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/admin
 * @author     Rohit Singhal <rohitsinghal.rs@gmail.com>
 */
class Rs_Twitter_Follow_Popup_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rs_Twitter_Follow_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rs_Twitter_Follow_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rs-twitter-follow-popup-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rs_Twitter_Follow_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rs_Twitter_Follow_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rs-twitter-follow-popup-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	 
	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'RS Twitter Follow Popup', 'RS Twitter Follow Popup', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	 
	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	 
	public function display_plugin_setup_page() {
	    add_option('twitter_page', 'Xtendify');
	    add_option('twitter_widget_id', 531741595062652928);
	    add_option('popup_show_after', 3);
	    include_once( 'partials/rs-twitter-follow-popup-admin-display.php' );
	}

	/**
	 * Validating input on admin settings.
	 *
	 * @since    1.0.0
	 */
	public function validate($input) {
        // All checkboxes inputs
        $valid = array();

        $valid['twitter_page'] = isset($input['twitter_page']) ? $input['twitter_page'] : '';

        if ( !$valid['twitter_page'] ) {
            add_settings_error(
                    'twitter_page',                     // Setting title
                    'twitter_page_texterror',            // Error ID
                    'Please enter a valid twitter page',     // Error message
                    'error'                         // Type of message
            );
        }

        $valid['twitter_widget_id'] = isset($input['twitter_widget_id']) ? $input['twitter_widget_id'] : '';

        if ( !$valid['twitter_widget_id'] || !is_numeric($valid['twitter_widget_id']  ) ) {
            add_settings_error(
                    'twitter_widget_id',                     // Setting title
                    'twitter_widget_id_texterror',            // Error ID
                    'Please enter a valid twitter widget ID',     // Error message
                    'error'                         // Type of message
            );
        }

        $valid['popup_show_after'] = isset($input['popup_show_after']) ? $input['popup_show_after'] : '';

        if ( !$valid['popup_show_after'] || !is_numeric($valid['popup_show_after']  ) ) {
            add_settings_error(
                    'popup_show_after',                     // Setting title
                    'popup_show_after_texterror',            // Error ID
                    'Please enter a valid popup delay',     // Error message
                    'error'                         // Type of message
            );
        }

        return $valid;
	}

	/**
	 * Updating options
	 *
	 * @since    1.0.0
	 */
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

}
