<?php 
function action_open_header() {
	echo '<header id="header">';
}
add_action('open_header', 'action_open_header');

function action_close_header() {
	echo '</header>';
}

add_action('close_header', 'action_close_header');

function action_open_footer() {
	echo '<footer>';
}
add_action('open_footer', 'action_open_footer');

function action_close_footer() {
	echo '</footer>';
}

add_action('close_footer', 'action_close_footer');


//Disable Gutenberg
function disable_gutenberg() {
	$Theme_Options = new Theme_Options();
	if($Theme_Options->disable_gutenberg) {
		add_filter( 'use_block_editor_for_post', '__return_false' );
	}
}

add_action( 'init', 'disable_gutenberg' );


//Allow shortcode in menu
add_filter('wp_nav_menu_items', 'do_shortcode');


function se_logout_redirect( $redirect_to, $requested_redirect_to, $user ) {
	$requested_redirect_to = get_permalink( get_option('woocommerce_myaccount_page_id') );

	return $requested_redirect_to;

}
add_filter( 'logout_redirect', 'se_logout_redirect', 10, 3 );


//Remove Editor
function remove_editor() {
	if (isset($_GET['post'])) {
		$id = $_GET['post'];
		$template = get_post_meta($id, '_wp_page_template', true);
		switch ($template) {
			case 'templates/modules.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
			remove_post_type_support('page', 'editor');
			break;
			default :
            // Don't remove any other template.
			break;
		}
	}
}
add_action('init', 'remove_editor');