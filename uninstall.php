<?php
/**
 * Runs on Uninstall of SocialShare
 */
// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; // Exit if accessed directly
}

if( get_option('social-share-del-data') == 1 ) {

	// Delete Options

	$options = array(
		'social-share-facebook',
		'social-share-twitter',
		'social-share-linkedin',
		'social-share-google-plus',
		'social-share-reddit',
		'social-share-pinterest',
		'social-share-tumblr',
		'show-on-page',
		'show-on-posts',
		'load-font-awesome',
		'show-icons-as',
		'show-menu-fixed',
		'social-share-del-data'
	);

	foreach ( $options as $option ) {
			delete_option( $option );
	}
}

?>