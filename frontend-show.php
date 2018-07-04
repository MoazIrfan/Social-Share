<?php

function add_social_share_icons($content)
{

    if( get_option("show-on-page") == 1 && is_page() ){
        return $content;
    }
    else if ( get_option("show-on-posts") == 1 && is_single() ){
        return $content;
    }
    else{

    	if( get_option( "show-menu-fixed" ) == "left" || get_option( "show-menu-fixed" ) == "right" ){

        	$html = "<div class='social-share-wrapper'>";
    	}

    	else {
    		$html = "<div class='social-share-wrapper'><div class='share-on'>".esc_html__('Share this', 'mypluginslug1').": </div>";
    	}

        global $post;

        $url = get_permalink($post->ID);
        $url = esc_url($url);

        if(get_option("social-share-facebook") == 1)
        {
        	$html = social_button_function( $html, $url, 'facebook' );

        }

        if(get_option("social-share-twitter") == 1)
        {
        	$html = social_button_function( $html, $url, 'twitter' );
        }

        if(get_option("social-share-linkedin") == 1)
        {
        	$html = social_button_function( $html, $url, 'linkedin' );
        }

        if(get_option("social-share-google-plus") == 1)
        {
            
        	$html = social_button_function( $html, $url, 'google-plus' );
        }

        if(get_option("social-share-reddit") == 1)
        {

        	$html = social_button_function( $html, $url, 'reddit' );
        }

        if(get_option("social-share-pinterest") == 1)
        {
        	$html = social_button_function( $html, $url, 'pinterest' );
        }

        if(get_option("social-share-tumblr") == 1)
        {
        	$html = social_button_function( $html, $url, 'tumblr' );
        }

        $html = $html . "<div class='clear'></div></div>";

        return $content = $content . $html;
    }
}

add_filter("the_content", "add_social_share_icons");
?>