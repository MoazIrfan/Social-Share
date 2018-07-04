<?php

/**
Plugin Name: Social Share
Plugin URI:
Description: SocialShare is a plugin that enables you to add social share buttons to all of your posts and/or pages easily. Customize icons & select menu location that suits best to your site.
Author:
Author URI:
Version: 1.0.1
License: GPLv3 or later
*/

// Define Path Of Plugin
define('My_Plugin_Path', plugins_url('social-share'));


// Including Required Files
require_once 'setting-api.php';
require_once 'social-share-function.php';
require_once 'frontend-show.php';

// Including StyleSheet
function social_share_style() 
{
    wp_register_style("social-share-style-file", My_Plugin_Path . "/assets/css/style.css");
    wp_enqueue_style("social-share-style-file");

    if( get_option("load-font-awesome") == 1 ){
        wp_register_style("font-awesome", My_Plugin_Path . "/assets/vendor/font-awesome.css");
        wp_enqueue_style("font-awesome");
    }

    if( get_option('show-menu-fixed') == 'left' ){
	    wp_register_style("social-share-stylesheet-left", My_Plugin_Path . "/assets/css/left.css");
	    wp_enqueue_style("social-share-stylesheet-left");    	
    }
    if( get_option('show-menu-fixed') == 'right' ){
	    wp_register_style("social-share-stylesheet-right", My_Plugin_Path . "/assets/css/right.css");
	    wp_enqueue_style("social-share-stylesheet-right");    	
    }
}

add_action("wp_enqueue_scripts", "social_share_style");

// Including Admin StyleSheet
function social_share_admin_style( $hook ) 
{
	if($hook != 'settings_page_social-share') {
                return;
    }
    wp_register_style("social-share-admin-style-file", My_Plugin_Path . "/assets/css/admin.css");
    wp_enqueue_style("social-share-admin-style-file");

    wp_enqueue_script("custom-js", My_Plugin_Path . "/assets/js/custom.js");
}

add_action("admin_enqueue_scripts", "social_share_admin_style");

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'social_share_add_action_links' );

function social_share_add_action_links( $links ) {
    $mylinks = array(
        '<a href="' . admin_url( 'options-general.php?page=social-share' ) . '">'.esc_html__('Settings','mypluginslug1').'</a>',
    );
    return array_merge( $links, $mylinks );
}
