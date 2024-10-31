<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://profiles.wordpress.org/rosinghal
 * @since      1.0.0
 *
 * @package    Rs_Twitter_Follow_Popup
 * @subpackage Rs_Twitter_Follow_Popup/public/partials
 */

?>

<?php
$options = get_option($this->plugin_name);
$twitter_page = $options['twitter_page'];
$twitter_widget_id = $options['twitter_widget_id'];
$popup_show_after = $options['popup_show_after'] * 1000;
if(!$twitter_page || !is_numeric($twitter_widget_id) || !is_numeric($popup_show_after)) {
	return;
}
?>

<div style="display:none;">
	<a id="rs-twitter-follow-popup-button" href="#" data-featherlight="#rs-twitter-follow-popup-container">Open some DOM in lightbox</a>
	<div id="rs-twitter-follow-popup-container">
		<div>
			<a class="twitter-timeline" href="https://twitter.com/<?php echo $twitter_page; ?>" data-widget-id="<?php echo $twitter_widget_id; ?>">Tweets by @<?php echo $twitter_page; ?></a>
		</div>
		<div style="text-align: center;">
			<a class="twitter-follow-button" href="https://twitter.com/<?php echo $twitter_page; ?>">Follow @<?php echo $twitter_page; ?></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		setTimeout(function(){
			jQuery.cookie('twitter_follow_popup', 1, { path: '/', expires: 7 });
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
			jQuery('#rs-twitter-follow-popup-button').click();
		}, <?php echo $popup_show_after; ?>);
	})
</script>