<?php 
class Helpers {
	function clean_string($string) {
		return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); 
	}
	
	function get_edit_url($url, $label = 'Edit') {
		if(current_user_can( 'administrator' )) {
			return '<div class="edit-holder"><a target="_blank" href="'.get_site_url().'/wp-admin/'.$url.'" class="edit-contents"> '.$label.' </a></div>';
		}
	}

	function get_bg_type($background, $alt='') {
		$bg_type = get_post_mime_type($background);
		if(str_contains($bg_type, 'video') == true) {
			return 'video';
		} else if(str_contains($bg_type, 'image') == true) {
			return 'image';
		}
	}

}