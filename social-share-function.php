<?php

function social_button_function( $html_code, $get_url, $social_media ) {

	if( get_option("load-font-awesome") == 1 && get_option("show-icons-as") == 'icon' ) {

        return $html_code = $html_code . "<div class='".$social_media." share-btn share-btn-as-icon'>
		<a target='_blank' href='".share_button_url( $social_media )."" . $get_url . "'>
		<i class='social-icon fa fa-".$social_media."'></i></a></div>";

	}

	elseif( get_option("load-font-awesome") == 1 && get_option("show-icons-as") == 'text' ){

		return $html_code = $html_code . "<div class='".$social_media." share-btn'>
		<a target='_blank' href='".share_button_url( $social_media )."" . $get_url . "'>
		<i class='social-icon fa fa-".$social_media."'></i>".$social_media."</a>
		</div>";
	
	}

	else {

		return $html_code = $html_code . "<div class='".$social_media." share-btn'>
		<a target='_blank' href='".share_button_url( $social_media )."" . $get_url . "'>".$social_media."</a>
		</div>";

	}

}

function share_button_url( $social_media ) {

	if( $social_media == 'facebook' ){
		return "http://www.facebook.com/sharer.php?u=";
	}
	elseif ( $social_media == 'twitter' ) {
		return "https://twitter.com/share?url=";
	}
	elseif ( $social_media == 'linkedin' ) {
		return "http://www.linkedin.com/shareArticle?url=";
	}
	elseif ( $social_media == 'fa-google-plus' ) {
		return "https://plus.google.com/share?url=";
	}
	elseif ( $social_media == 'reddit' ) {
		return "http://reddit.com/submit?url=";
	}
	elseif ( $social_media == 'pinterest' ) {
		return "http://pinterest.com/pin/create/link/?url=";
	}
	elseif ( $social_media == 'tumblr' ) {
		return "http://www.tumblr.com/share/link?url=";
	}

}

?>