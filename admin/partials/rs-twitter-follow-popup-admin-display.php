<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://profiles.wordpress.org/rosinghal
 * @since      1.0.0
 *
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/admin/partials
 */
?>

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <form method="post" name="social_options" action="options.php">

    <?php 
	    //Grab all options      
	    $options = get_option($this->plugin_name);

	    $twitter_page = $options['twitter_page'];
	    $twitter_widget_id = $options['twitter_widget_id'];
	    $popup_show_after = $options['popup_show_after'];
    ?>


    <?php
        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
    ?>

	    <!-- insert twitter page -->
	    <fieldset>
	        <legend class="screen-reader-text"><span><?php _e('Twitter page (username)', $this->plugin_name);?></span></legend>
	        <label for="<?php echo $this->plugin_name;?>-twitter_page">
	            <input type="text" id="<?php echo $this->plugin_name;?>-twitter_page" name="<?php echo $this->plugin_name;?>[twitter_page]" value="<?php echo $twitter_page; ?>" />
	            <span><?php esc_attr_e( 'Twitter page (username)', $this->plugin_name ); ?></span>
	        </label>
	    </fieldset>

	    <!-- insert twitter widget id -->
	    <fieldset>
	        <legend class="screen-reader-text"><span><?php _e('Twitter widget ID', $this->plugin_name);?></span></legend>
	        <label for="<?php echo $this->plugin_name;?>-twitter_widget_id">
	            <input type="text" id="<?php echo $this->plugin_name;?>-twitter_widget_id" name="<?php echo $this->plugin_name;?>[twitter_widget_id]" value="<?php echo $twitter_widget_id; ?>" />
	            <span><?php esc_attr_e( 'Twitter widget ID', $this->plugin_name ); ?></span>
	        </label>
	    </fieldset>

	    <!-- insert google plus page id -->
	    <fieldset>
	        <legend class="screen-reader-text"><span><?php _e('Popup Delay (in seconds)', $this->plugin_name);?></span></legend>
	        <label for="<?php echo $this->plugin_name;?>-popup_show_after">
	            <input type="number" min="1" id="<?php echo $this->plugin_name;?>-popup_show_after" name="<?php echo $this->plugin_name;?>[popup_show_after]" value="<?php echo $popup_show_after; ?>" />
	            <span><?php esc_attr_e( 'Popup Delay (in seconds)', $this->plugin_name ); ?></span>
	        </label>
	    </fieldset>

        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>


    </form>

</div>